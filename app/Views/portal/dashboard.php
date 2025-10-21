<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header pb-0 px-3">
        <h3 class="mb-0 text-black">Practise By Categories</h3>
      <form class="d-flex align-items-center mt-3 mb-2" role="search" style="max-width: 350px;">
        <div class="input-group">
          <input class="form-control" type="search" placeholder="Search categories..." aria-label="Search" id="categorySearchInput" style="border-color: #ff2323;">
          <span class="input-group-text bg-white" style="border-color: #ff2323;">
            <i class="fas fa-search text-primary"></i>
          </span>
        </div>
        <!-- <button class="btn btn-outline-primary btn-sm mb-0" type="submit" disabled style="border-radius: 0px 10px 10px 0px; border-left-color: transparent; border:2px solid #ff2323;border-left-color: transparent;">
          <i class="fas fa-search"></i>
        </button> -->
      </form>
      <script>
        // Simple real-time filtering of category cards
        document.addEventListener('DOMContentLoaded', function() {
          const searchInput = document.getElementById('categorySearchInput');
          if (searchInput) {
            searchInput.addEventListener('input', function() {
              const query = this.value.trim().toLowerCase();
              const cards = document.querySelectorAll('.card-title');
              cards.forEach(function(cardTitle) {
                const card = cardTitle.closest('.col-md-4');
                if (cardTitle.textContent.toLowerCase().includes(query)) {
                  card.style.display = '';
                } else {
                  card.style.display = 'none';
                }
              });
            });
          }
        });
      </script>
      </div>

      <div class="card-body pt-4 p-3">
        <div class="row g-4" id="categoryCardsRow">
          <!-- The category cards will be dynamically inserted here by JavaScript -->
        </div>

        <!-- Pagination controls -->
        <nav aria-label="Category pagination">
          <ul class="pagination justify-content-center mt-4" id="categoryPagination">
            <!-- Pagination items will be dynamically inserted here -->
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
