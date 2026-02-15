(function () {
  const form = document.getElementById("sbtechDevelopersForm");
  const resultsWrap = document.getElementById("sbtechDevelopersResults");
  const nameInput = document.getElementById("developer_name");
  const suggestBox = document.getElementById("devNameSuggest");

  const areaToggle = document.getElementById("devAreaToggle");
  const areaList = document.getElementById("devAreaList");
  const areaCounter = document.getElementById("devAreaCounter");

  if (!form || !resultsWrap) return;

  const postAjax = async (action, dataObj) => {
    const fd = new FormData();
    fd.append("action", action);
    fd.append("nonce", SBTECH_DEV.nonce);

    Object.keys(dataObj || {}).forEach((k) => {
      const v = dataObj[k];
      if (Array.isArray(v)) v.forEach((val) => fd.append(k + "[]", val));
      else fd.append(k, v);
    });

    const res = await fetch(SBTECH_DEV.ajax, { method: "POST", body: fd });

    // if server returns HTML or error, this helps debugging
    const text = await res.text();
    try {
      return JSON.parse(text);
    } catch (e) {
      console.error("AJAX non-JSON response:", text);
      return null;
    }
  };

  const getSelectedAreas = () => {
    const checks = areaList.querySelectorAll('input[type="checkbox"][name="developer_area[]"]');
    const selected = [];
    checks.forEach((c) => c.checked && selected.push(c.value));
    return selected;
  };

  const updateAreaCounter = () => {
    const selected = getSelectedAreas().filter((v) => v !== "0");
    areaCounter.textContent = selected.length ? `(${selected.length})` : "";
  };

  const closeAreas = () => areaList.classList.remove("show");
  const toggleAreas = () => areaList.classList.toggle("show");

  // Dropdown toggle
  areaToggle?.addEventListener("click", toggleAreas);
  document.addEventListener("click", (e) => {
    if (!areaToggle.contains(e.target) && !areaList.contains(e.target)) closeAreas();
  });

  // See all logic
  areaList?.addEventListener("change", (e) => {
    const target = e.target;
    if (target.name !== "developer_area[]") return;

    const allBox = areaList.querySelector('input[value="0"]');

    if (target.value === "0" && target.checked) {
      areaList.querySelectorAll('input[name="developer_area[]"]').forEach((c) => {
        if (c.value !== "0") c.checked = false;
      });
    } else if (target.value !== "0" && target.checked) {
      if (allBox) allBox.checked = false;
    }

    const selected = getSelectedAreas();
    if (selected.length === 0 && allBox) allBox.checked = true;

    updateAreaCounter();
  });

  updateAreaCounter();

  // Filter submit
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    resultsWrap.classList.add("is-loading");

    const name = nameInput.value || "";
    const areas = getSelectedAreas();

    const json = await postAjax("sbtech_filter_developers", {
      developer_name: name,
      developer_area: areas,
    });

    if (json && json.success && json.data && typeof json.data.html === "string") {
      resultsWrap.innerHTML = json.data.html;
    } else {
      console.warn("Filter AJAX failed:", json);
    }

    resultsWrap.classList.remove("is-loading");
    closeAreas();
  });

  // Name suggestion debounce
  let t = null;
  const debounce = (fn, wait) => {
    clearTimeout(t);
    t = setTimeout(fn, wait);
  };

  const hideSuggest = () => {
    suggestBox.classList.remove("show");
    suggestBox.innerHTML = "";
  };

  nameInput?.addEventListener("input", () => {
    const q = nameInput.value.trim();

    debounce(async () => {
      if (!q.length) return hideSuggest();

      // ✅ Correct action name (matches PHP)
      const json = await postAjax("sbtech_developer_suggest", { keyword: q });

      if (!json || !json.success) return hideSuggest();

      const items = (json.data && json.data.items) ? json.data.items : [];
      if (!items.length) return hideSuggest();

      suggestBox.innerHTML = items
        .map((it) => `<button type="button" class="dev-suggest-item" data-title="${escapeHtml(it.title)}">${escapeHtml(it.title)}</button>`)
        .join("");

      suggestBox.classList.add("show");
    }, 250);
  });

  suggestBox?.addEventListener("click", (e) => {
    const btn = e.target.closest(".dev-suggest-item");
    if (!btn) return;

    nameInput.value = btn.getAttribute("data-title") || "";
    hideSuggest();
    form.dispatchEvent(new Event("submit"));
  });

  document.addEventListener("click", (e) => {
    if (!suggestBox.contains(e.target) && e.target !== nameInput) hideSuggest();
  });

  function escapeHtml(str) {
    return String(str)
      .replaceAll("&", "&amp;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;");
  }
})();
