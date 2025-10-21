      <!-- Bootstrap JS and dependencies -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
                <a href="javascript:void(0)" class="font-weight-bold text-primary" target="_blank">MedBank SA</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>


  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>





  <script>
    // Data for the cards
    const categoriesData = [
      {
        title: "Acute & Emergency",
        text: "Explore cases and scenarios in acute and emergency medicine.",
        url: "#"
      },
      {
        title: "Biomedical Sciences",
        text: "Review the fundamental sciences underlying clinical practice.",
        url: "#"
      },
      {
        title: "Breast Surgery",
        text: "Learn about procedures, diagnostics, and management in breast surgery.",
        url: "#"
      },
      {
        title: "Cardiology",
        text: "Deepen your understanding of cardiac conditions and management.",
        url: "#"
      },
      {
        title: "Dermatology",
        text: "Investigate skin disorders, diagnosis, and treatment.",
        url: "#"
      },
      {
        title: "ENT Surgery",
        text: "Study conditions and approaches in Ear, Nose, and Throat surgery.",
        url: "#"
      },
      {
        title: "Endocrinology",
        text: "Explore disorders of the endocrine system and metabolic diseases.",
        url: "#"
      },
      {
        title: "Gastroenterology",
        text: "Cover topics related to digestive tract and liver.",
        url: "#"
      },
      {
        title: "General Practice",
        text: "Broaden your knowledge for primary care scenarios.",
        url: "#"
      }
    ];

    const CARDS_PER_PAGE = 6;
    let currentPage = 1;
    let filteredCategories = [...categoriesData];

    function renderCategoryCards(page = 1) {
      const start = (page - 1) * CARDS_PER_PAGE;
      const end = start + CARDS_PER_PAGE;
      const categoriesToShow = filteredCategories.slice(start, end);

      const cardsRow = document.getElementById('categoryCardsRow');
      cardsRow.innerHTML = '';

      if (categoriesToShow.length === 0) {
        cardsRow.innerHTML = '<div class="col-12 text-center text-secondary py-5"><em>No categories found.</em></div>';
        return;
      }

      categoriesToShow.forEach(cat => {
        const col = document.createElement('div');
        col.className = 'col-md-4';
        col.innerHTML = `
          <div class="card border shadow-sm h-100">
            <div class="card-body d-flex flex-column align-items-center text-center">
              <h5 class="card-title" style="font-weight: 700;">${cat.title}</h5>
              <p class="card-text">${cat.text}</p>
              <a href="${cat.url}" class="btn btn-primary btn-sm mt-auto">View Topics</a>
            </div>
          </div>`;
        cardsRow.appendChild(col);
      });
    }

    function renderPagination() {
      const totalPages = Math.ceil(filteredCategories.length / CARDS_PER_PAGE);
      const pagination = document.getElementById('categoryPagination');
      pagination.innerHTML = '';

      if (totalPages <= 1) return; // No pagination needed

      // Previous button
      const prevLi = document.createElement('li');
      prevLi.className = 'page-item' + (currentPage === 1 ? ' disabled' : '');
      prevLi.innerHTML = `<a class="page-link" href="#" tabindex="-1">&laquo;</a>`;
      prevLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage > 1) {
          currentPage--;
          renderCategoryCards(currentPage);
          renderPagination();
          scrollToCategories();
        }
      });
      pagination.appendChild(prevLi);

      // Numbered buttons
      for (let i = 1; i <= totalPages; i++) {
        const li = document.createElement('li');
        li.className = 'page-item' + (i === currentPage ? ' active' : '');
        li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        li.addEventListener('click', function(e) {
          e.preventDefault();
          currentPage = i;
          renderCategoryCards(currentPage);
          renderPagination();
          scrollToCategories();
        });
        pagination.appendChild(li);
      }

      // Next button
      const nextLi = document.createElement('li');
      nextLi.className = 'page-item' + (currentPage === totalPages ? ' disabled' : '');
      nextLi.innerHTML = `<a class="page-link" href="#">&raquo;</a>`;
      nextLi.addEventListener('click', function(e) {
        e.preventDefault();
        if (currentPage < totalPages) {
          currentPage++;
          renderCategoryCards(currentPage);
          renderPagination();
          scrollToCategories();
        }
      });
      pagination.appendChild(nextLi);
    }

    function applySearchFilter() {
      const searchInput = document.getElementById('categorySearchInput');
      const query = searchInput.value.trim().toLowerCase();
      filteredCategories = categoriesData.filter(c =>
        c.title.toLowerCase().includes(query) || c.text.toLowerCase().includes(query)
      );
      currentPage = 1;
      renderCategoryCards(currentPage);
      renderPagination();
    }

    function scrollToCategories() {
      // Optionally scroll to the top of the category cards area when paginating
      const el = document.getElementById('categoryCardsRow');
      if (el) el.scrollIntoView({ behavior: "smooth", block: "start" });
    }

    document.addEventListener('DOMContentLoaded', function () {
      // Add real-time filtering for pagination too
      const searchInput = document.getElementById('categorySearchInput');
      if (searchInput) {
        searchInput.addEventListener('input', applySearchFilter);
      }
      renderCategoryCards(currentPage);
      renderPagination();
    });
  </script>

</body>

</html>