<?php
require_once("db.php");
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
if (isset($_POST["sort"])) {
    $query = '';
    if ($_POST["sort"] == "asc") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) ORDER BY nama_fashion ASC";
    } else {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) ORDER BY nama_fashion DESC";
    }
    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($result)) {
        $key = array_rand($arr);
        echo '
        <div class="col col-sm-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="card h-100 mx-auto" style="width: 18rem;">
                <img src="./img/'.$key.'.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize fw-bold">' . $data["nama_fashion"] . '</h5>
                    <p class="card-text">' . $data["ukuran"] . '</p>
                    <p class="card-text">Rp ' . number_format($data["harga"],2,",",".") . '</p>
                    <div class="d-inline" style="position: absolute; bottom: 15px; right: 15px;">
                        <button data-bs-toggle="modal" data-backdrop="static" data-bs-target="#updatedata" id="editbutton" class="btn btn-primary"><i class="bi bi-pencil"></i></button>
                        <a href="#" class="btn btn-danger"  id="' . $data["id_fashion"] . '" onclick="hapus(' . $data["id_fashion"] . ')"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>';
    }
} else if (isset($_POST["ukuran"])) {
    $query = '';
    if ($_POST["ukuran"] == "S") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE ukuran='S'";
    } else if ($_POST["ukuran"] == "M") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE ukuran='M'";
    } else if ($_POST["ukuran"] == "L") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE ukuran='L'";
    } else if ($_POST["ukuran"] == "XL") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE ukuran='XL'";
    } else {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE ukuran='XXL'";
    }
    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($result)) {
        $key = array_rand($arr);
        echo '
        <div class="col col-sm-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="card h-100 mx-auto" style="width: 18rem;">
                <img src="./img/'.$key.'.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize fw-bold">' . $data["nama_fashion"] . '</h5>
                    <p class="card-text">' . $data["ukuran"] . '</p>
                    <p class="card-text">Rp ' . number_format($data["harga"],2,",",".") . '</p>
                    <div class="d-inline" style="position: absolute; bottom: 15px; right: 15px;">
                        <button 
                        id-fashion="' . $data['id_fashion'] . '"
                        nama-fashion="' . $data['nama_fashion'] . '"
                        harga="' . $data['harga'] . '"
                        id-categories="' . $data['id_categories'] . '"
                        id-size="' . $data['id_size'] . '"
                        data-bs-toggle="modal" data-backdrop="static" data-bs-target="#updatedata" id="editbutton" class="btn btn-primary"><i class="bi bi-pencil"></i></button>
                        <a href="#" class="btn btn-danger"  id="' . $data["id_fashion"] . '" onclick="hapus(' . $data["id_fashion"] . ')"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>';
    }
} else if (isset($_POST["jenis_categories"])) {
    $query = '';
    if ($_POST["jenis_categories"] == "hoddie") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE jenis_categories='hoddie'";
    } else if ($_POST["jenis_categories"] == "shirt") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE jenis_categories='shirt'";
    } else if ($_POST["jenis_categories"] == "flanel") {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE jenis_categories='flanel'";
    } else {
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE jenis_categories='crewneck'";
    }
    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($result)) {
        $key = array_rand($arr);
        echo '
        <div class="col col-sm-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="card h-100 mx-auto" style="width: 18rem;">
                <img src="./img/'.$key.'.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize fw-bold">' . $data["nama_fashion"] . '</h5>
                    <p class="card-text">' . $data["ukuran"] . '</p>
                    <p class="card-text">Rp ' . number_format($data["harga"],2,",",".") . '</p>
                    <div class="d-inline" style="position: absolute; bottom: 15px; right: 15px;">
                        <button 
                        id-fashion="' . $data['id_fashion'] . '"
                        nama-fashion="' . $data['nama_fashion'] . '"
                        harga="' . $data['harga'] . '"
                        id-categories="' . $data['id_categories'] . '"
                        id-size="' . $data['id_size'] . '"
                        data-bs-toggle="modal" data-backdrop="static" data-bs-target="#updatedata" id="editbutton" class="btn btn-primary"><i class="bi bi-pencil"></i></button>
                        <a href="#" class="btn btn-danger"  id="' . $data["id_fashion"] . '" onclick="hapus(' . $data["id_fashion"] . ')"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {

    //!! >>> SEARCH <<<
    $output = '';
    if (isset($_POST["query"])) {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $limit = 6;
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) WHERE nama_fashion LIKE '%" . $search . "%' ORDER BY nama_fashion ASC LIMIT 0, $limit";

    } elseif (isset($_POST["load"])) {
        $count = "SELECT count(*) AS jumlah FROM fashion";
        $hasil = $conn->prepare($count);
        $hasil->execute();
        $res1 = $hasil->get_result();
        $row = $res1->fetch_assoc();
        $total_records = $row['jumlah'];
        $total_records -= 6;
        $jumlah_page = ceil($total_records / $_POST["load"]);
        $limit = 6;
        $limit += $_POST["load"];
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size ) ORDER BY nama_fashion ASC LIMIT 0, $limit";

    } else {
        $limit = 6;
        $query = "SELECT fashion.id_fashion, fashion.nama_fashion, fashion.harga, fashion.id_categories, fashion.id_size, categories.jenis_categories, size.ukuran
        FROM ((fashion
        INNER JOIN categories ON fashion.id_categories = categories.id_categories)
        INNER JOIN size ON fashion.id_size = size.id_size) ORDER BY nama_fashion ASC LIMIT 0, $limit";
    }
    $result = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_array($result)) {
        $key = array_rand($arr);
        $output .= '
        <div class="col col-sm-12 col-md-6 col-lg-4 col-xxl-3">
            <div class="card h-100 mx-auto" style="width: 18rem;">
                <img src="./img/'.$key.'.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-capitalize fw-bold">' . $data["nama_fashion"] . '</h5>
                    <p class="card-text">' . $data["ukuran"] . '</p>
                    <p class="card-text">Rp ' . number_format($data["harga"],2,",",".") . '</p>
                    <div class="d-inline" style="position: absolute; bottom: 15px; right: 15px;">
                        <button 
                        id-fashion="' . $data['id_fashion'] . '"
                        nama-fashion="' . $data['nama_fashion'] . '"
                        harga="' . $data['harga'] . '"
                        id-categories="' . $data['id_categories'] . '"
                        id-size="' . $data['id_size'] . '"
                        data-bs-toggle="modal" data-backdrop="static" data-bs-target="#updatedata" id="editbutton" class="btn btn-primary"><i class="bi bi-pencil"></i></button>
                        <a href="#" class="btn btn-danger"  id="' . $data["id_fashion"] . '" onclick="hapus(' . $data["id_fashion"] . ')"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>';
    }
    echo $output;
}

?>

<script>
    //!! >>> HAPUS DATA <<<
    function hapus(id) {
        if (confirm("Apakah anda yakin?")) {
            $.ajax({
                url: "delete.php",
                method: "POST",
                data: {
                    id_fashion: id
                },
                success: function(data) {
                    console.log("Data berhasil dihapus")
                    $.ajax({
                        url: "select.php",
                        method: "POST",
                        data: {
                            query: ''
                        },
                        success: function(data) {
                            $('#content').html(data);
                        }
                    });
                }
            });

        }
    }
</script>