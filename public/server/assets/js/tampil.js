function loadData() {
    $.ajax({
        url: "/get",
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $('tbody').empty();
            for (i = 0; i < data.length; i++) {
                $('tbody').append(
                    `<tr>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <div class="avatar rounded">
                                                          <div class="avatar-content" style="color:gray">
                                                          P${data[i].nomor_antrian}
                                                          </div>
                                                      </div>
                                                      <div>
                                                          <div class="fw-bolder">${data[i].nik_ktp}</div>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <span>${data[i].nama_lengkap}</span>
                                                  </div>
                                              </td>
                                              <td class="text-nowrap">
                                                  <div class="d-flex flex-column">
                                                      <span class="fw-bolder mb-25">${data[i].umur}</span>

                                                  </div>
                                              </td>
                                              <td>${data[i].jenis_kelamin}</td>
                                              <td>
                                                  <div class="d-flex align-items-center">
                                                      <span class="fw-bolder me-1">${data[i].alamat}</span>
                                                      <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                                                  </div>
                                              </td>
                                          </tr>`
                );

            }
        },

    });
}

setInterval(loadData, 1000);
