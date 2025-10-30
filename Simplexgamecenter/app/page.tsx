export default function Page() {
  return (
    <main className="min-h-screen flex items-center justify-center p-8">
      <div className="max-w-2xl text-center space-y-4">
        <h1 className="text-3xl font-bold">Simplex Game Center</h1>
        <p className="text-muted-foreground">
          Selamat datang! Gunakan menu untuk menjelajah. Untuk pemesanan konsol, buka halaman Rental.
        </p>
        <div>
          <a
            href="/rental"
            className="inline-flex items-center px-4 py-2 rounded-md border border-white/20 hover:bg-white/10 transition"
          >
            Buka Halaman Rental
          </a>
        </div>
      </div>
    </main>
  )
}
