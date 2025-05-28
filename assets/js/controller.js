$(document).ready(function () {
  function readURL(input, id) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#" + id).attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#foto2").change(function () {
    readURL(this, "priv2");
  });
  //TABEL UMUM
  $("table.table-striped").DataTable();

  //Tabel Jenis Supplier
  var tabelJenisSupp = $("#tabelJenisSupp").DataTable({
    ajax: { url: baseurl + "userjson", dataSrc: "" },
    columns: [
      { data: "nomor" },
      { data: "nama" },
      {
        data: "",
        render: function () {
          return (
            '<div class="btn-group btn-block">' +
            '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
            '<i class="fa fa-gears"></i> Opsi  ' +
            '<span class="caret"></span>' +
            '<span class="sr-only"> Toggle Dropdown</span>' +
            '</button><ul class="dropdown-menu" role="menu">' +
            '<li><a href="javascript:void(0)" id="editjs">Edit</a></li>' +
            '<li><a href="javascript:void(0)" id="deljs">Hapus</a></li>' +
            "</ul></div>"
          );
        },
      },
    ],
  });
  $("#tabelJenisSupp tbody").on("click", "#editjs", function () {
    var data = tabelJenisSupp.row($(this).parents("tr")).data();
    // console.log(data);s
    $.ajax({
      type: "GET",
      dataType: "text",
      url: baseurl + "JenisSupplier/editJenSupp/" + data["id"],
      cache: false,
      success: function (data) {
        if (data) {
          $("#modal_target").html(data);
          $("#modal").modal("toggle");
          $("#foto").change(function () {
            readURL(this, "priv");
          });
          //FORM EDIT DATA USER
          $("form#editjs").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
              url: baseurl + "JenisSupplier/editJenSupp/",
              type: "POST",
              data: formData,
              success: function (data) {
                toastr.success(data, "Sukses");
                tabelJenisSupp.ajax.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, "ERROR");
              },
              cache: false,
              contentType: false,
              processData: false,
            });
          });
        } else {
          console.log(data);
        }
      },
      error: function () {
        toastr.options.onHidden = function () {
          window.location.reload();
        };
        toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
      },
    });
  });
  $("#tabelJenisSupp tbody").on("click", "#deljs", function () {
    var data = tabelJenisSupp.row($(this).parents("tr")).data();
    $.confirm({
      title: "Hapus Data",
      columnClass: "medium",
      content:
        '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
      type: "red",
      buttons: {
        hapus: {
          text: "Ya , Hapus Data",
          btnClass: "btn-danger",
          action: function () {
            var options = {
              url: baseurl + "JenisSupplier/removeJenSupp/",
              dataType: "text",
              type: "POST",
              data: { idjs: data["idjs"] },
              success: function (data) {
                toastr.options.onHidden = function () {
                  tabeluser.ajax.reload();
                };
                toastr.success(data, "Sukses");
                // tabeldosen.ajax.reload();
              },
              error: function (xhr, status, error) {
                toastr.options.onHidden = function () {
                  window.location.reload();
                };
                toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
              },
            };
            $.ajax(options);
          },
        },
        batal: {
          text: "Batal",
          btnClass: "btn-blue",
          action: function () {},
        },
      },
    });
  });

  //ADD JENIS SUPPLIER
  $("#jenisSuppAdd").click(function () {
    console.log("tombol add clicked");
    $.ajax({
      type: "GET",
      url: baseurl + "JenisSupplier/addJenSup",
      cache: false,
      success: function (data) {
        $("#modal_target").html(data);
        $("#modal").modal("toggle");
        $("form#addjs").submit(function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          $.ajax({
            url: baseurl + "JenisSupplier/addJenSup",
            type: "POST",
            data: formData,
            success: function (data) {
              toastr.success(data, "Sukses");
              reload_user();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError, "ERROR");
            },
            cache: false,
            contentType: false,
            processData: false,
          });
        });
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
    });
  });

  //TABEL USER
  var tabeluser = $("#tabeluser").DataTable({
    ajax: { url: baseurl + "userjson", dataSrc: "" },
    columns: [
      { data: "nomor" },
      { data: "usn" },
      { data: "role" },
      {
        data: "foto",
        render: function (data) {
          return (
            '<img class="attachment-img" src="' +
            baseurl +
            "assets/images/" +
            data +
            '" style="width:128px;height:128px" alt="Image Preview">'
          );
        },
      },
      {
        data: "status",
        render: function (data) {
          if (data == 1) {
            return '<button class="btn btn-success btn-block">Aktif</button></td></td>';
          } else {
            return '<button class="btn btn-danger btn-block">Non-Aktif</button></td></td>';
          }
        },
      },
      {
        data: "",
        render: function () {
          return (
            '<div class="btn-group btn-block">' +
            '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
            '<i class="fa fa-gears"></i> Opsi  ' +
            '<span class="caret"></span>' +
            '<span class="sr-only"> Toggle Dropdown</span>' +
            '</button><ul class="dropdown-menu" role="menu">' +
            '<li><a href="javascript:void(0)" id="edituser">Edit</a></li>' +
            '<li><a href="javascript:void(0)" id="deluser">Hapus</a></li>' +
            "</ul></div>"
          );
        },
      },
    ],
  });
  $("#tabeluser tbody").on("click", "#edituser", function () {
    var data = tabeluser.row($(this).parents("tr")).data();
    console.log(data);
    // $.ajax({
    //   type: "GET",
    //   dataType: "text",
    //   url: baseurl + "useredit/" + data["id_ngota"],
    //   cache: false,
    //   success: function (data) {
    //     if (data) {
    //       $("#modal_target").html(data);
    //       $("#modal").modal("toggle");
    //       $("#foto").change(function () {
    //         readURL(this, "priv");
    //       });
    //       //FORM EDIT DATA USER
    //       $("form#editus").submit(function (e) {
    //         e.preventDefault();
    //         var formData = new FormData(this);
    //         $.ajax({
    //           url: baseurl + "Usermanager/edituser",
    //           type: "POST",
    //           data: formData,
    //           success: function (data) {
    //             toastr.success(data, "Sukses");
    //             reload_user();
    //           },
    //           error: function (xhr, ajaxOptions, thrownError) {
    //             toastr.error(thrownError, "ERROR");
    //           },
    //           cache: false,
    //           contentType: false,
    //           processData: false,
    //         });
    //       });
    //     } else {
    //       console.log(data);
    //     }
    //   },
    //   error: function () {
    //     toastr.options.onHidden = function () {
    //       window.location.reload();
    //     };
    //     toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
    //   },
    // });
  });
  $("#tabeluser tbody").on("click", "#deluser", function () {
    var data = tabeluser.row($(this).parents("tr")).data();
    $.confirm({
      title: "Hapus Data",
      columnClass: "medium",
      content:
        '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
      type: "red",
      buttons: {
        hapus: {
          text: "Ya , Hapus Data",
          btnClass: "btn-danger",
          action: function () {
            var options = {
              url: baseurl + "Usermanager/deluser/",
              dataType: "text",
              type: "POST",
              data: { iduser: data["id_ngota"] },
              success: function (data) {
                toastr.options.onHidden = function () {
                  tabeluser.ajax.reload();
                };
                toastr.success(data, "Sukses");
                // tabeldosen.ajax.reload();
              },
              error: function (xhr, status, error) {
                toastr.options.onHidden = function () {
                  window.location.reload();
                };
                toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
              },
            };
            $.ajax(options);
          },
        },
        batal: {
          text: "Batal",
          btnClass: "btn-blue",
          action: function () {},
        },
      },
    });
  });

  //ADD USER
  $("#useradd").click(function () {
    console.log("add user button clicked")
    $.ajax({
      type: "GET",
      url: baseurl + "Usermanager/adduser",
      cache: false,
      success: function (data) {
        $("#modal_target").html(data);
        $("#modal").modal("toggle");
        $("#foto").change(function () {
          readURL(this, "priv");
        });
        $("form#addus").submit(function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          $.ajax({
            url: baseurl + "Usermanager/adduser",
            type: "POST",
            data: formData,
            success: function (data) {
              toastr.success(data, "Sukses");
              reload_user();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError, "ERROR");
            },
            cache: false,
            contentType: false,
            processData: false,
          });
        });
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
    });
  });
  $("form#gantifoto").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var id = $("#idus").val();
    $.ajax({
      url: baseurl + "user/foto/" + id,
      type: "POST",
      data: formData,
      success: function (data) {
        toastr.success(data, "Sukses");
        window.location.reload();
        // window.location = baseurl + "logout";
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  });
  $("form#gantipass").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: baseurl + "home/ppwd",
      type: "POST",
      data: formData,
      success: function (data) {
        toastr.success(data, "Sukses");
        window.location.reload();
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  });
  $("form#gantipass-opt").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: baseurl + "user/ppwd",
      type: "POST",
      data: formData,
      success: function (data) {
        toastr.success(data, "Sukses");
        window.location.reload();
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  });

  //TABEL PERIODE

  /**var tabelperiode = $("#tabelperiode").DataTable({
    ajax: { url: baseurl + "Periode/listperiode", dataSrc: "" },
    columns: [
      { data: "nomor" },
      { data: "tgl_mulai" },
      { data: "tgl_selesai" },
      {
        data: "",
        render: function () {
          return (
            '<div class="btn-group btn-block">' +
            '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
            '<i class="fa fa-gears"></i> Opsi  ' +
            '<span class="caret"></span>' +
            '<span class="sr-only"> Toggle Dropdown</span>' +
            '</button><ul class="dropdown-menu" role="menu">' +
            '<li><a href="javascript:void(0)" id="editp">Edit</a></li>' +
            '<li><a href="javascript:void(0)" id="delp">Hapus</a></li>' +
            "</ul></div>"
          );
        },
      },
    ],
  });*/

  let columnPeriode = [
    { data: "nomor" },
    { data: "tgl_mulai" },
    { data: "tgl_selesai" },
  ];

  if (role == "ADMIN" || role == "OPERATOR") {
    columnPeriode.push({
      data: null,
      render: function () {
        return `
          <div class="btn-group btn-block">
            <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i> Opsi
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0)" id="editp" class="btn-edit">Edit</a></li>
              <li><a href="javascript:void(0)" id="delp" class="btn-delete">Hapus</a></li>
            </ul>
          </div>
        `;
      },
    });
  }

  var tabelperiode = $("#tabelperiode").DataTable({
    ajax: { url: baseurl + "periode/listperiode", dataSrc: "" },
    columns: columnPeriode,
  });

  $("#tabelperiode tbody").on("click", "#editp", function () {
    var data = tabelperiode.row($(this).parents("tr")).data();
    $.ajax({
      type: "GET",
      dataType: "text",
      url: baseurl + "Periode/editperiode/" + data["id_tahun"],
      cache: false,
      success: function (data) {
        if (data) {
          $("#modal_target").html(data);
          $("#modal").modal("toggle");
          //FORM EDIT DATA USER
          $("form#editp").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
              url: baseurl + "Periode/editperiode/",
              type: "POST",
              data: formData,
              success: function (data) {
                toastr.success(data, "Sukses");
                tabelperiode.ajax.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, "ERROR");
              },
              cache: false,
              contentType: false,
              processData: false,
            });
          });
        } else {
          console.log(data);
        }
      },
      error: function () {
        toastr.options.onHidden = function () {
          window.location.reload();
        };
        toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
      },
    });
  });
  $("#tabelperiode tbody").on("click", "#delp", function () {
    var data = tabelperiode.row($(this).parents("tr")).data();
    $.confirm({
      title: "Hapus Data",
      columnClass: "medium",
      content:
        '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
      type: "red",
      buttons: {
        hapus: {
          text: "Ya , Hapus Data",
          btnClass: "btn-danger",
          action: function () {
            var options = {
              url: baseurl + "Periode/removeperiode/",
              dataType: "text",
              type: "POST",
              data: { idtahun: data["id_tahun"] },
              success: function (data) {
                toastr.options.onHidden = function () {
                  tabelperiode.ajax.reload();
                };
                toastr.success(data, "Sukses");
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.options.onHidden = function () {
                  window.location.reload();
                };
                toastr.error(thrownError, "ERROR");
              },
            };
            $.ajax(options);
          },
        },
        batal: {
          text: "Batal",
          btnClass: "btn-blue",
          action: function () {},
        },
      },
    });
  });

  //ADD PERIODE
  $("#periodadd").click(function () {
    $.ajax({
      type: "GET",
      url: baseurl + "Periode/addperiode",
      cache: false,
      success: function (data) {
        $("#modal_target").html(data);
        $("#modal").modal("toggle");
        $("form#addp").submit(function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          $.ajax({
            url: baseurl + "Periode/addperiode",
            type: "POST",
            data: formData,
            success: function (data) {
              toastr.success(data, "Sukses");
              tabelperiode.ajax.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError, "ERROR");
            },
            cache: false,
            contentType: false,
            processData: false,
          });
        });
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
    });
  });

  //TABEL KRITERIA
  // var tabelkriteria = $("#tabelkriteria").DataTable({
  //   ajax: { url: baseurl + "Kriteria/listkriteria", dataSrc: "" },
  //   columns: [
  //     { data: "nomor" },
  //     { data: "ketkri" },
  //     { data: "bobot" },
  //     { data: "atribut" },
  //     { data: "name" },
  //     {
  //       data: "status",
  //       render: function (data) {
  //         if (data == 1) {
  //           return '<button class="btn btn-success btn-block">Aktif</button></td></td>';
  //         } else {
  //           return '<button class="btn btn-danger btn-block">Non-Aktif</button></td></td>';
  //         }
  //       },
  //     },
  //     {
  //       data: "",
  //       render: function () {
  //         return (
  //           '<div class="btn-group btn-block">' +
  //           '<button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown" aria-expanded="false">' +
  //           '<i class="fa fa-gears"></i> Opsi  ' +
  //           '<span class="caret"></span>' +
  //           '<span class="sr-only"> Toggle Dropdown</span>' +
  //           '</button><ul class="dropdown-menu" role="menu">' +
  //           '<li><a href="javascript:void(0)" id="editk">Edit</a></li>' +
  //           '<li><a href="javascript:void(0)" id="delk">Delete</a></li>' +
  //           "</ul></div>"
  //         );
  //       },
  //     },
  //   ],
  // });

  let columnkriteria = [
    { data: "nomor" },
    { data: "ketkri" },
    { data: "bobot" },
    { data: "atribut" },
    { data: "name",
    },
  ];

  if (role == "ADMIN" || role == "OPERATOR") {
    columnkriteria.push({
      data: null,
      render: function () {
        return `
          <div class="btn-group btn-block">
            <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i> Opsi
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0)" id="editk" class="btn-edit">Edit</a></li>
              <li><a href="javascript:void(0)" id="delk" class="btn-delete">Hapus</a></li>
            </ul>
          </div>
        `;
      },
    });
  }

  var tabelkriteria = $("#tabelkriteria").DataTable({
    ajax: { url: baseurl + "kriteria/listkriteria", dataSrc: "" },
    columns: columnkriteria,
  });

  $("#tabelkriteria tbody").on("click", "#editk", function () {
    var data = tabelkriteria.row($(this).parents("tr")).data();
    $.ajax({
      type: "GET",
      dataType: "text",
      url: baseurl + "Kriteria/editkriteria/" + data["idkri"],
      cache: false,
      success: function (data) {
        if (data) {
          $("#modal_target").html(data);
          $("#modal").modal("toggle");
          //FORM EDIT DATA USER
          $("form#editk").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
              url: baseurl + "Kriteria/editkriteria/",
              type: "POST",
              data: formData,
              success: function (data) {
                toastr.success(data, "Sukses");
                tabelkriteria.ajax.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, "ERROR");
              },
              cache: false,
              contentType: false,
              processData: false,
            });
          });
        } else {
          console.log(data);
        }
      },
      error: function () {
        toastr.options.onHidden = function () {
          window.location.reload();
        };
        toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
      },
    });
  });
  $("#tabelkriteria tbody").on("click", "#delk", function () {
    var data = tabelkriteria.row($(this).parents("tr")).data();
    $.confirm({
      title: "Hapus Data",
      columnClass: "medium",
      content:
        '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
      type: "red",
      buttons: {
        hapus: {
          text: "Ya , Hapus Data",
          btnClass: "btn-danger",
          action: function () {
            var options = {
              url: baseurl + "Kriteria/removekriteria/",
              dataType: "text",
              type: "POST",
              data: { kri: data["idkri"] },
              success: function (data) {
                toastr.options.onHidden = function () {
                  tabelkriteria.ajax.reload();
                };
                toastr.success(data, "Sukses");
                // tabeldosen.ajax.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.options.onHidden = function () {
                  window.location.reload();
                };
                toastr.error(thrownError, "ERROR");
              },
            };
            $.ajax(options);
          },
        },
        batal: {
          text: "Batal",
          btnClass: "btn-blue",
          action: function () {},
        },
      },
    });
  });

  //ADD KRITERIA
  $("#kritadd").click(function () {
    $.ajax({
      type: "GET",
      url: baseurl + "Kriteria/addkriteria",
      cache: false,
      success: function (data) {
        $("#modal_target").html(data);
        $("#modal").modal("toggle");
        $("form#addk").submit(function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          $.ajax({
            url: baseurl + "Kriteria/addkriteria",
            type: "POST",
            data: formData,
            success: function (data) {
              toastr.success(data, "Sukses");
              tabelkriteria.ajax.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError, "ERROR");
            },
            cache: false,
            contentType: false,
            processData: false,
          });
        });
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
    });
  });

  //TABEL SUB KRITERIA
  //   console.log("sub kriteria work");
  let columnSubKriteria = [
    { data: "nomor" },
    { data: "idkri" },
    { data: "nama_sub" },
    { data: "indikator" },
    { data: "bobot" },
  ];

  if (role == "ADMIN" || role == "OPERATOR") {
    columnSubKriteria.push({
      data: null,
      render: function () {
        return `
          <div class="btn-group btn-block">
            <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i> Opsi
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0)" id="editsk" class="btn-edit">Edit</a></li>
              <li><a href="javascript:void(0)" id="delsk" class="btn-delete">Hapus</a></li>
            </ul>
          </div>
        `;
      },
    });
  }

  var tabelSubKriteria = $("#tabelSubKriteria").DataTable({
    ajax: { url: baseurl + "SubKriteria/listSubKriteria", dataSrc: "" },
    columns: columnSubKriteria,
  });

  $("#tabelSubKriteria tbody").on("click", "#editsk", function () {
    var data = tabelSubKriteria.row($(this).parents("tr")).data();
    $.ajax({
      type: "GET",
      dataType: "text",
      url: baseurl + "subkriteria/editSubKriteria/" + data["idsub"],
      cache: false,
      success: function (data) {
        if (data) {
          $("#modal_target").html(data);
          $("#modal").modal("toggle");
          //FORM EDIT DATA USER
          $("form#editsk").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
              url: baseurl + "subkriteria/editSubKriteria/",
              type: "POST",
              data: formData,
              success: function (data) {
                toastr.success(data, "Sukses");
                tabelSubKriteria.ajax.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, "ERROR");
              },
              cache: false,
              contentType: false,
              processData: false,
            });
          });
        } else {
          console.log(data);
        }
      },
      error: function () {
        toastr.options.onHidden = function () {
          window.location.reload();
        };
        toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
      },
    });
  });
  $("#tabelSubKriteria tbody").on("click", "#delsk", function () {
    var data = tabelSubKriteria.row($(this).parents("tr")).data();
    $.confirm({
      title: "Hapus Data",
      columnClass: "medium",
      content:
        '<strong style="font-size: 20px;">Apakah Anda yakin ingin menghapus data ini ?</strong>',
      type: "red",
      buttons: {
        hapus: {
          text: "Ya , Hapus Data",
          btnClass: "btn-danger",
          action: function () {
            var options = {
              url: baseurl + "SubKriteria/removeSubKriteria/",
              dataType: "text",
              type: "POST",
              data: { subkri: data["idsub"] },
              success: function (data) {
                toastr.options.onHidden = function () {
                  tabelSubKriteria.ajax.reload();
                };
                toastr.success(data, "Sukses");
                // tabeldosen.ajax.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.options.onHidden = function () {
                  window.location.reload();
                };
                toastr.error(thrownError, "ERROR");
              },
            };
            $.ajax(options);
          },
        },
        batal: {
          text: "Batal",
          btnClass: "btn-blue",
          action: function () {},
        },
      },
    });
  });

  //ADD SUB KRITERIA
  $("#subKritAdd").click(function () {
    $.ajax({
      type: "GET",
      url: baseurl + "SubKriteria/addSubKriteria",
      cache: false,
      success: function (data) {
        $("#modal_target").html(data);
        $("#modal").modal("toggle");

        $("form#addsk").submit(function (e) {
          e.preventDefault();
          var formData = new FormData(this);
          $.ajax({
            url: baseurl + "subkriteria/addSubKriteria",
            type: "POST",
            data: formData,
            success: function (data) {
              toastr.success(data, "Sukses");
              tabelSubKriteria.ajax.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError, "ERROR");
            },
            cache: false,
            contentType: false,
            processData: false,
          });
        });
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      },
    });
  });

  //TABEL ALTER
  // Inisialisasi DataTable
  // var tabelalter = $("#tabelalter").DataTable({
  //   ajax: { url: baseurl + "Alternatif/listalter", dataSrc: "" },
  //   columns: [
  //     { data: "nomor" },
  //     { data: "ket" },
  //     {
  //       data: "status",
  //       render: function (data) {
  //         return data == 1
  //           ? '<button class="btn btn-success btn-block">Aktif</button>'
  //           : '<button class="btn btn-danger btn-block">Non-Aktif</button>';
  //       },
  //     },
  //     {
  //       data: null,
  //       render: function () {
  //         console.log(role);
  //         if (role == 'ADMIN' || role == 'OPERATOR') {
  //           return `
  //             <div class="btn-group btn-block">
  //               <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">
  //                 <i class="fa fa-gears"></i> Opsi
  //                 <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
  //               </button>
  //               <ul class="dropdown-menu" role="menu">
  //                 <li><a href="#" class="btn-edit">Edit</a></li>
  //                 <li><a href="#" class="btn-delete">Hapus</a></li>
  //               </ul>
  //             </div>
  //           `;
  //         } else {
  //           return ""; // no buttons for other roles
  //         }
  //       },
  //     },
  //   ],
  // });
  let columns = [
    { data: "nomor" },
    { data: "ket" },
    {
      data: "",
     
    },
  ];

  if (role == "ADMIN" || role == "OPERATOR") {
    columns.push({
      data: null,
      render: function () {
        return `
          <div class="btn-group btn-block">
            <button type="button" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gears"></i> Opsi
              <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="javascript:void(0)" class="btn-edit">Edit</a></li>
              <li><a href="javascript:void(0)" class="btn-delete">Hapus</a></li>
            </ul>
          </div>
        `;
      },
    });
  }

  var tabelalter = $("#tabelalter").DataTable({
    ajax: { url: baseurl + "Alternatif/listalter", dataSrc: "" },
    columns: columns,
  });

  $("#tabelalter tbody").on("click", ".btn-edit", function () {
    var data = tabelalter.row($(this).parents("tr")).data();
    $.ajax({
      type: "GET",
      url: baseurl + "Alternatif/editalter/" + data["idalter"],
      cache: false,
      success: function (response) {
        if (response) {
          $("#modal_target").html(response);
          $("#modal").modal("toggle");

          $("form#edital").submit(function (e) {
            e.preventDefault();
            console.log("button edit work");

            var formData = new FormData(this);
            $.ajax({
              url: baseurl + "Alternatif/editalter/",
              type: "POST",
              data: formData,
              success: function (data) {
                toastr.success(data, "Sukses");
                tabelalter.ajax.reload();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError, "ERROR");
              },
              cache: false,
              contentType: false,
              processData: false,
            });
          });
        } else {
          console.log(data);
        }
      },
      error: function () {
        toastr.options.onHidden = function () {
          window.location.reload();
        };
        toastr.error("Terjadi Kesalahan Silahkan Coba Lagi", "ERROR");
      },
    });
  });

  /**$("#tabelalter tbody").on("click", ".btn-edit", function () {
    var data = tabelalter.row($(this).parents("tr")).data();
    var idnya = data["idalter"];

    $.ajax({
      type: "GET",
      url: baseurl + "Alternatif/editalter/" + idnya,
      success: function (response) {
        $("#modal_target").html(response);
        $("#modal").modal("show");

        console.log(response);

        // Pastikan binding dilakukan setelah modal sepenuhnya ditampilkan
        $("#modal").one("shown.bs.modal", function () {
          $("form#edital")
            .off("submit")
            .on("submit", function (e) {
              console.log("edit work");
              e.preventDefault();

              var form = $(this);
              var formData = new FormData(this);
              var submitButton = form.find('input[type="submit"]');

              submitButton.prop("disabled", true);

              $.ajax({
                type: "POST",
                url: baseurl + "Alternatif/editalter/" + idnya,
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                  toastr.success(result, "Sukses");
                  $("#modal").modal("hide");
                  tabelalter.ajax.reload();
                },
                error: function (xhr, status, error) {
                  toastr.error(error, "ERROR");
                },
                complete: function () {
                  submitButton.prop("disabled", false);
                },
              });
            });
        });
      },
      error: function () {
        toastr.error("Gagal mengambil data edit.", "ERROR");
      },
    });
  }); */

  // Delete data
  $("#tabelalter tbody").on("click", ".btn-delete", function () {
    var data = tabelalter.row($(this).parents("tr")).data();
    var idnya = data["idalter"];

    $.confirm({
      title: "Hapus Data",
      columnClass: "medium",
      content:
        "<strong style='font-size: 20px;'>Apakah Anda yakin ingin menghapus data ini?</strong>",
      type: "red",
      buttons: {
        hapus: {
          text: "Ya, Hapus Data",
          btnClass: "btn-danger",
          action: function () {
            $.ajax({
              type: "POST",
              url: baseurl + "Alternatif/removealt",
              data: { idalter: idnya },
              success: function (response) {
                toastr.success(response, "Sukses");
                tabelalter.ajax.reload();
              },
              error: function (xhr, status, error) {
                toastr.error(error, "ERROR");
              },
            });
          },
        },
        batal: {
          text: "Batal",
          btnClass: "btn-blue",
        },
      },
    });
  });

  // Add data
  $("#alteradd").on("click", function () {
    $.ajax({
      type: "GET",
      url: baseurl + "Alternatif/addalter",
      success: function (response) {
        $("#modal_target").html(response);
        $("#modal").modal("show");

        $("form#addal")
          .off("submit")
          .on("submit", function (e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(this);
            var submitButton = form.find('input[type="submit"]');

            submitButton.prop("disabled", true);

            $.ajax({
              type: "POST",
              url: baseurl + "Alternatif/addalter",
              data: formData,
              contentType: false,
              processData: false,
              success: function (result) {
                toastr.success(result, "Sukses");
                $("#modal").modal("hide");
                tabelalter.ajax.reload();
              },
              error: function (xhr, status, error) {
                toastr.error(error, "ERROR");
              },
              complete: function () {
                submitButton.prop("disabled", false);
              },
            });
          });
      },
      error: function () {
        toastr.error("Gagal membuka form tambah.", "ERROR");
      },
    });
  });

  $("form#addal-opt").submit(function (e) {
    e.preventDefault();

    var form = $(this);
    var formData = new FormData(this);
    var submitButton = form.find('input[type="submit"]');

    submitButton.prop("disabled", true);

    // for (var pair of formData.entries()) {
    //   console.log(pair[0] + ": " + pair[1]);
    // }

    $.ajax({
      type: "POST",
      url: baseurl + "Alternatif/addalter",
      data: formData,
      contentType: false,
      processData: false,
      success: function (result) {
        form[0].reset();
        // form.find("select").val(null).trigger("change");
        $("select[id^='subkrit']").val("").trigger("change");

        toastr.success(result, "Sukses");
      },
      error: function (xhr, status, error) {
        toastr.error(error, "ERROR");
      },
      complete: function () {
        submitButton.prop("disabled", false);
      },
    });
  });

  $("#carper").on("click", function (event) {
    event.preventDefault();
    var periode = $("#perid").val();
    $.ajax({
      url: baseurl + "Admin/isihasil",
      type: "POST",
      data: { param1: periode },
    })
      .done(function (data) {
        toastr.success("Sukses Pencarian", "Sukses");
        $("#ganti").html(data);
      })
      .fail(function (hr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      });
  });
  $("#carper2").on("click", function (event) {
    event.preventDefault();
    var periode = $("#perid2").val();
    $.ajax({
      url: baseurl + "Admin/hitung",
      type: "POST",
      data: { param1: periode },
    })
      .done(function (data) {
        toastr.success("Sukses Pencarian", "Sukses");
        $("#ganti").html(data);
        $("#printlap").on("click", function () {
          $("#printpa").printThis();
        });
      })
      .fail(function (hr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "ERROR");
      });
  });
  $("#preview").click(function (e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      dataType: "text",
      url: baseurl + "Admin/dummy",
      cache: false,
      success: function (data) {
        if (data) {
          $("#modal_targetlg").html(data);
          $("#modallg").modal("toggle");
        } else {
          console.log(data);
        }
      },
      error: function () {
        toastr.options.onHidden = function () {
          window.location.reload();
        };
        toastr.error("Terjadi Kesalahan Silakan Coba lagi", "ERROR");
      },
    });
  });
  $("#headnote").summernote({
    tableClassName: function () {
      this.className = "table borderless";
      this.style.cssText = "";
    },
    callbacks: {
      onImageUpload: function (image) {
        uploadImage(image[0], "#headnote");
      },
      onMediaDelete: function (target) {
        deleteImage(target[0].src);
      },
    },
  });
  $("#bodynote").summernote({
    tableClassName: function () {
      this.className = "table borderless";
      this.style.cssText = "";
    },
    callbacks: {
      onImageUpload: function (image) {
        uploadImage(image[0], "#bodynote");
      },
      onMediaDelete: function (target) {
        deleteImage(target[0].src);
      },
    },
  });
  $("#footnote").summernote({
    tableClassName: function () {
      this.className = "table borderless";
      this.style.cssText = "";
    },
    callbacks: {
      onImageUpload: function (image) {
        uploadImage(image[0], "#footnote");
      },
      onMediaDelete: function (target) {
        deleteImage(target[0].src);
      },
    },
  });
  function uploadImage(image, idnote) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
      url: baseurl + "admin/upload_image",
      cache: false,
      contentType: false,
      processData: false,
      data: data,
      type: "POST",
      success: function (url) {
        $(idnote).summernote("insertImage", url);
      },
      error: function (data) {
        console.log(data);
      },
    });
  }
  function deleteImage(src) {
    $.ajax({
      data: { src: src },
      type: "POST",
      url: baseurl + "admin/delete_image",
      cache: false,
      success: function (response) {
        console.log(response);
      },
    });
  }
  $("form#format").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: baseurl + "admin/save",
      type: "POST",
      data: formData,
      success: function (data) {
        toastr.success(data, "Sukses");
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "Gagal");
      },
      cache: false,
      contentType: false,
      processData: false,
    });
  });

  $("#logo").change(function () {
    readURL(this, "previewimg");
  });
  $("form#setting").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: baseurl + "Admin/savelogo",
      cache: false,
      contentType: false,
      processData: false,
      type: "POST",
      data: formData,
      success: function (data) {
        toastr.success(data, "Sukses");
      },
      error: function (xhr, ajaxOptions, thrownError) {
        toastr.error(thrownError, "Gagal");
      },
    });
  });

  function reload_user() {
    var tabeluser = $("#tabeluser").DataTable();
    tabeluser.ajax.reload();
  }

  var tablehistory = $("#tablehistory").DataTable({
    ajax: { url: baseurl + "history", dataSrc: "" },
    columns: [
      { data: "nomor" },
      { data: "menu" },
      { data: "aksi" },
      { data: "user_name" },
      { data: "tanggal_aksi" },
    ],
  });
});
