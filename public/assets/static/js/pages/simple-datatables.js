let dataTable = new simpleDatatables.DataTable(
  document.getElementById("table1"),
  {
    perPage: 10,
    perPageSelect: [10, 25, 50, 100],
    searchable: true,
    sortable: true,
    labels: {
      placeholder: "Cari...",
      perPage: "{select} baris per halaman",
      noRows: "Tidak ada data",
      info: "Menampilkan {start} sampai {end} dari {rows} baris",
      infoFiltered: "(difilter dari {rows} total baris)",
      infoEmpty: "Tidak ada data yang tersedia",
      infoTitle: "",
      pagination: {
        first: "Pertama",
        last: "Terakhir",
        next: "Selanjutnya",
        previous: "Sebelumnya",
      },
    },
  }
)
// Move "per page dropdown" selector element out of label
// to make it work with bootstrap 5. Add bs5 classes.
function adaptPageDropdown() {
  const selector = dataTable.wrapper.querySelector(".dataTable-selector")
  selector.parentNode.parentNode.insertBefore(selector, selector.parentNode)
  selector.classList.add("form-select")
}

// Add bs5 classes to pagination elements
function adaptPagination() {
  const paginations = dataTable.wrapper.querySelectorAll(
    "ul.dataTable-pagination-list"
  )

  for (const pagination of paginations) {
    pagination.classList.add(...["pagination", "pagination-primary"])
  }

  const paginationLis = dataTable.wrapper.querySelectorAll(
    "ul.dataTable-pagination-list li"
  )

  for (const paginationLi of paginationLis) {
    paginationLi.classList.add("page-item")
  }

  const paginationLinks = dataTable.wrapper.querySelectorAll(
    "ul.dataTable-pagination-list li a"
  )

  for (const paginationLink of paginationLinks) {
    paginationLink.classList.add("page-link")
  }
}

const refreshPagination = () => {
  adaptPagination()
}

// Patch "per page dropdown" and pagination after table rendered
dataTable.on("datatable.init", () => {
  adaptPageDropdown()
  refreshPagination()
})
dataTable.on("datatable.update", refreshPagination)
dataTable.on("datatable.sort", refreshPagination)

// Re-patch pagination after the page was changed
dataTable.on("datatable.page", adaptPagination)
