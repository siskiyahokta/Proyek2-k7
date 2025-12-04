<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameService
{
    public function create(array $data): Game
    {
        $payload = $this->preparePayload($data);

        return Game::create($payload);
    }

    public function update(Game $game, array $data): Game
    {
        $payload = $this->preparePayload($data, $game);

        $game->update($payload);

        return $game;
    }

    protected function preparePayload(array $data, ?Game $existing = null): array
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title'] ?? '');

        foreach (['genres', 'platforms', 'modes', 'languages'] as $field) {
            if (!empty($data[$field]) && is_string($data[$field])) {
                $data[$field] = array_values(array_filter(array_map('trim', explode(',', $data[$field]))));
            }
        }

        if (isset($data['cover']) && $data['cover'] instanceof UploadedFile) {
            if ($existing?->cover) {
                $this->deleteFile($existing->cover);
            }
            $path = $data['cover']->store('covers', 'public');
            $data['cover'] = '/storage/' . $path;
        }

        if (isset($data['screenshots']) && is_array($data['screenshots'])) {
            $paths = [];
            foreach ($data['screenshots'] as $file) {
                if ($file instanceof UploadedFile) {
                    $paths[] = '/storage/' . $file->store('screenshots', 'public');
                }
            }
            $data['screenshots'] = $paths;
        }

        return $data;
    }

    protected function deleteFile(string $path): void
    {
        $relative = ltrim(str_replace('/storage/', '', $path), '/');

        if (Storage::disk('public')->exists($relative)) {
            Storage::disk('public')->delete($relative);
        }
    }

    public function delete(Game $game): void
    {
        if ($game->cover) {
            $this->deleteFile($game->cover);
        }

        if (is_array($game->screenshots)) {
            foreach ($game->screenshots as $path) {
                $this->deleteFile($path);
            }
        }

        $game->delete();
    }
}
