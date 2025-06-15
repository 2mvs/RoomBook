<form action="" method="POST" class="flex gap-3 w-full">
    @csrf
    <div id="select-wrapper" class="relative w-1/5">
        <input
          type="text"
          id="search"
          placeholder="Localisation"
          class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-200"
        />
        <ul
          id="options"
          class="absolute z-10 w-full bg-white border border-gray-300 mt-1 rounded max-h-60 overflow-y-auto hidden"
        >
          <li class="p-2 text-neutral-500 text-sm hover:bg-red-100 cursor-pointer">AvorObame</li>
          <li class="p-2 text-neutral-500 text-sm hover:bg-red-100 cursor-pointer">Charbonnages</li>
          <li class="p-2 text-neutral-500 text-sm hover:bg-red-100 cursor-pointer">Glass</li>
          <li class="p-2 text-neutral-500 text-sm hover:bg-red-100 cursor-pointer">Louis</li>
          <li class="p-2 text-neutral-500 text-sm hover:bg-red-100 cursor-pointer">Nzeng Ayong</li>
          <li class="p-2 text-neutral-500 text-sm hover:bg-red-100 cursor-pointer">Petro Owendo</li>
        </ul>
      </div>
    <input type="number" name="capacity" placeholder="Capacité minimale" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-200 w-1/5" min="0">
    <input type="number" name="capacity" placeholder="Capacité maximale" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-200 w-1/5" min="0">
    <input type="number" name="price" placeholder="Budget" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-200 w-1/5" min="0">

    <button class="bg-red-400 p-2 outline-none rounded-md text-white flex-1">Rechercher</button>
</form>


  <script defer>
    document.addEventListener("DOMContentLoaded", () => {
      const searchInput = document.getElementById("search");
      const optionsList = document.getElementById("options");
      const items = Array.from(optionsList.children);

      searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase();
        items.forEach(item => {
          const visible = item.textContent.toLowerCase().includes(query);
          item.style.display = visible ? "block" : "none";
        });
      });

      items.forEach(item => {
        item.addEventListener("click", () => {
          searchInput.value = item.textContent;
          optionsList.classList.add("hidden");
        });
      });

      searchInput.addEventListener("focus", () => {
        optionsList.classList.remove("hidden");
      });

      document.addEventListener("click", (e) => {
        if (!e.target.closest("#select-wrapper")) {
          optionsList.classList.add("hidden");
        }
      });
    });
  </script>

  