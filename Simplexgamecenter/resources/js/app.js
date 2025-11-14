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
})
