document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".navbar")
  const onScroll = () => {
    if (!nav) return
    if (window.scrollY > 12) nav.classList.add("navbar-scrolled")
    else nav.classList.remove("navbar-scrolled")
  }
  onScroll()
  window.addEventListener("scroll", onScroll, { passive: true })

  // Hook tombol "Mainkan" opsional: isi modal berdasarkan data attribute
  const modalEl = document.getElementById("gameDetailModal")
  const titleEl = modalEl?.querySelector("[data-detail='title']")
  const coverEl = modalEl?.querySelector("[data-detail='cover']")
  const infoEl = modalEl?.querySelector("[data-detail='info']")

  document.querySelectorAll("[data-action='open-game']").forEach((btn) => {
    btn.addEventListener("click", () => {
      try {
        const data = JSON.parse(btn.getAttribute("data-game") || "{}")
        if (titleEl) titleEl.textContent = data.title || "Detail Game"
        if (coverEl) {
          const path = data.cover ? "/" + String(data.cover).replace(/^\/+/, "") : "/images/placeholder-640x360.jpg"
          coverEl.setAttribute("src", path)
        }
        if (infoEl)
          infoEl.textContent = [data.developer, data.release_year, data.age_rating].filter(Boolean).join(" • ")
        if (window.bootstrap && modalEl) {
          new window.bootstrap.Modal(modalEl).show()
        }
      } catch (e) {
        console.log("[v0] gagal parse data-game:", e)
      }
    })
  })

  // Animated counters for elements with [data-counter]
  const counters = document.querySelectorAll("[data-counter]")
  const animateCounter = (el) => {
    const target = Number(el.getAttribute("data-counter") || "0")
    const duration = 900
    const start = performance.now()
    const startVal = 0

    const step = (now) => {
      const p = Math.min(1, (now - start) / duration)
      const val = Math.floor(startVal + (target - startVal) * (0.5 - Math.cos(Math.PI * p) / 2)) // easeInOut
      el.textContent = target > 999 ? val.toLocaleString("id-ID") : String(val)
      if (p < 1) requestAnimationFrame(step)
    }
    requestAnimationFrame(step)
  }

  const obs = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add("revealed")
          if (e.target.matches("[data-counter]")) animateCounter(e.target)
          obs.unobserve(e.target)
        }
      })
    },
    { threshold: 0.25 },
  )

  document.querySelectorAll(".reveal-on-scroll, [data-counter]").forEach((el) => obs.observe(el))

  // Compatibility: if #gameModal structure exists and no inline handler, populate it from button data-*
  const gameModal = document.getElementById("gameModal")
  if (gameModal && window.bootstrap) {
    gameModal.addEventListener("show.bs.modal", (event) => {
      const btn = event.relatedTarget
      if (!btn) return
      const get = (name, def = "") => btn.getAttribute(name) || def
      const title = get("data-title", "Game")
      const img = get("data-img", "/images/placeholder-640x360.jpg")
      const genre = get("data-genre", "")
      const platform = get("data-platform", "")
      const desc = get("data-description", "")
      const dev = get("data-developer", "-")
      const year = get("data-year", "-")
      const age = get("data-age", "-")
      const slug = (title || "")
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, "-")
        .replace(/(^-|-$)+/g, "")

      const $ = (sel) => gameModal.querySelector(sel)
      const imgEl = $("#gameModalImg")
      if (imgEl) {
        imgEl.src = img
        imgEl.alt = "Sampul " + title
      }
      const map = {
        "#gameModalLabel": title,
        "#gameModalGenre": genre,
        "#gameModalPlatform": platform,
        "#gameModalDesc": desc,
        "#gameModalDev": dev,
        "#gameModalYear": year,
        "#gameModalAge": age,
      }
      Object.entries(map).forEach(([sel, val]) => {
        const el = $(sel)
        if (el) el.textContent = val
      })
      const detail = $("#gameModalDetail")
      if (detail) detail.setAttribute("href", `${window.location.origin}/games/${slug}`)
    })
  }
})
