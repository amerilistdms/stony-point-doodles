(() => {
  const header = document.querySelector("[data-header]");
  const nav = document.querySelector("[data-nav]");
  const toggle = document.querySelector("[data-menu-toggle]");

  const onScroll = () => {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 12);
  };
  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  if (toggle && nav) {
    toggle.addEventListener("click", () => {
      const open = nav.classList.toggle("is-open");
      toggle.classList.toggle("is-open", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
    });
  }

  document.querySelectorAll("[data-filter-group]").forEach((group) => {
    const cards = group.parentElement.querySelectorAll(".hr-card");
    group.addEventListener("click", (event) => {
      const btn = event.target.closest("button[data-filter]");
      if (!btn) return;
      group.querySelectorAll("button").forEach((b) => b.classList.remove("is-on"));
      btn.classList.add("is-on");
      const key = btn.dataset.filter;
      cards.forEach((card) => {
        const show = key === "all" || card.dataset.size === key || card.dataset.status === key;
        card.classList.toggle("is-hidden", !show);
      });
    });
  });

  document.querySelectorAll("[data-quotes]").forEach((viewport) => {
    const track = viewport.querySelector(".hr-quotes__track");
    if (!track) return;
    const section = viewport.closest(".hr-quotes");
    const prev = section?.querySelector("[data-quote-prev]");
    const next = section?.querySelector("[data-quote-next]");
    let index = 0;
    const cards = track.children;
    const step = () => {
      const width = cards[0] ? cards[0].getBoundingClientRect().width + 20 : 540;
      const max = Math.max(0, cards.length - 1);
      index = Math.min(Math.max(index, 0), max);
      track.style.transform = `translateX(${-index * width}px)`;
    };
    prev?.addEventListener("click", () => {
      index -= 1;
      step();
    });
    next?.addEventListener("click", () => {
      index += 1;
      step();
    });
    window.addEventListener("resize", step);
  });

  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const reveals = document.querySelectorAll(".hr-reveal");
  if (reduce || !("IntersectionObserver" in window)) {
    reveals.forEach((el) => el.classList.add("is-in"));
  } else {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-in");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: "0px 0px -40px 0px" }
    );
    reveals.forEach((el) => io.observe(el));
  }

  const close123Menu = () => {
    document.querySelectorAll(".hr-123-dd").forEach((n) => n.remove());
  };

  const open123Menu = (wrap, select) => {
    close123Menu();
    const box = wrap.querySelector("[data-role='i123-input']") || wrap;
    const rect = box.getBoundingClientRect();
    const menu = document.createElement("div");
    menu.className = "hr-123-dd";
    menu.style.top = `${rect.bottom}px`;
    menu.style.left = `${rect.left}px`;
    menu.style.width = `${rect.width}px`;
    [...select.options].forEach((opt, i) => {
      const row = document.createElement("button");
      row.type = "button";
      row.textContent = opt.textContent;
      if (!opt.value || opt.disabled) row.classList.add("is-placeholder");
      if (opt.selected) row.classList.add("is-on");
      row.addEventListener("click", (event) => {
        event.preventDefault();
        event.stopPropagation();
        select.selectedIndex = i;
        select.dispatchEvent(new Event("input", { bubbles: true }));
        select.dispatchEvent(new Event("change", { bubbles: true }));
        const skin = wrap.querySelector("[data-role='dropdown-skin']");
        if (skin) {
          const texts = [...skin.childNodes].filter((node) => node.nodeType === 3);
          if (texts.length) texts.forEach((node) => { node.textContent = opt.textContent; });
          else skin.insertBefore(document.createTextNode(opt.textContent), skin.firstChild);
        }
        close123Menu();
      });
      menu.appendChild(row);
    });
    document.body.appendChild(menu);
  };

  const bind123Dropdowns = (root = document) => {
    root.querySelectorAll('[data-ui-role="ui-element"][data-type="dropdown"], [data-type="drop-down"]').forEach((wrap) => {
      if (wrap.dataset.hrDd === "1") return;
      wrap.dataset.hrDd = "1";
      wrap.addEventListener("click", (event) => {
        const select = wrap.querySelector("select");
        if (!select) return;
        event.preventDefault();
        event.stopPropagation();
        if (document.querySelector(".hr-123-dd")) close123Menu();
        else open123Menu(wrap, select);
      });
    });
  };

  bind123Dropdowns();
  const ddWatch = new MutationObserver(() => bind123Dropdowns());
  ddWatch.observe(document.body, { childList: true, subtree: true });
  document.addEventListener("click", (event) => {
    if (!event.target.closest(".hr-123-dd") && !event.target.closest('[data-type="dropdown"], [data-type="drop-down"]')) {
      close123Menu();
    }
  });
  window.addEventListener("resize", close123Menu);

  const forms = window.HR_FORMS || {};
  document.querySelectorAll("[data-form-123]").forEach((el) => {
    const slot = el.getAttribute("data-form-123");
    const raw = String(forms[slot] || el.getAttribute("data-form-id") || "").trim();
    if (!raw) return;
    const id = (raw.match(/(\d{4,})/) || [])[1];
    if (!id) return;
    const script = document.createElement("script");
    script.src = "https://form.123formbuilder.com/embed/" + id + ".js";
    script.defer = true;
    script.setAttribute("data-role", "form");
    script.setAttribute("data-default-width", "100%");
    el.replaceChildren(script);
  });

  const lightboxGalleries = document.querySelectorAll("[data-lightbox-gallery]");
  if (lightboxGalleries.length) {
    const shell = document.createElement("div");
    shell.className = "hr-lightbox";
    shell.setAttribute("hidden", "");
    shell.innerHTML = `
      <button type="button" class="hr-lightbox__close" aria-label="Close">×</button>
      <button type="button" class="hr-lightbox__prev" aria-label="Previous">
        <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="15 6 9 12 15 18"></polyline></svg>
      </button>
      <img class="hr-lightbox__img" alt="">
      <button type="button" class="hr-lightbox__next" aria-label="Next">
        <svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="9 6 15 12 9 18"></polyline></svg>
      </button>
    `;
    document.body.appendChild(shell);
    const img = shell.querySelector(".hr-lightbox__img");
    const closeBtn = shell.querySelector(".hr-lightbox__close");
    const prevBtn = shell.querySelector(".hr-lightbox__prev");
    const nextBtn = shell.querySelector(".hr-lightbox__next");
    let items = [];
    let index = 0;

    const show = (i) => {
      if (!items.length) return;
      index = (i + items.length) % items.length;
      const item = items[index];
      img.src = item.src;
      img.alt = item.alt || "";
    };
    const open = (list, start) => {
      items = list;
      shell.hidden = false;
      shell.classList.add("is-open");
      document.body.style.overflow = "hidden";
      show(start);
    };
    const close = () => {
      shell.classList.remove("is-open");
      shell.hidden = true;
      document.body.style.overflow = "";
      img.removeAttribute("src");
    };

    lightboxGalleries.forEach((gallery) => {
      const triggers = [...gallery.querySelectorAll("[data-lightbox-src]")];
      const list = triggers.map((btn) => ({
        src: btn.getAttribute("data-lightbox-src"),
        alt: btn.getAttribute("data-lightbox-alt") || "",
      }));
      triggers.forEach((btn, i) => {
        btn.addEventListener("click", () => open(list, i));
      });
    });

    closeBtn.addEventListener("click", close);
    prevBtn.addEventListener("click", () => show(index - 1));
    nextBtn.addEventListener("click", () => show(index + 1));
    shell.addEventListener("click", (event) => {
      if (event.target === shell) close();
    });
    document.addEventListener("keydown", (event) => {
      if (!shell.classList.contains("is-open")) return;
      if (event.key === "Escape") close();
      if (event.key === "ArrowLeft") show(index - 1);
      if (event.key === "ArrowRight") show(index + 1);
    });
  }
})();
