<!-- Slider -->
<?php 
  $sql_sl = mysqli_query($conn, "select * from slides order by id_slides");
  $button='';
  $slides='';
  $actice ='class="active"';
  $i=0;
  if(mysqli_num_rows($sql_sl) > 0){
    while($row_sl = mysqli_fetch_assoc($sql_sl)){
      $button = $button.'<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'"  aria-current="true" aria-label="Slide '.$i.'" '.$actice.'></button>';
      $actice='';
      $i=$i+1;

      $slides = $slides . '
        <div class="carousel-item active">
          <img src="./images/slider/'.$row_sl['ten_slides'].'" class="d-block w-100" alt="...">
        </div>
      ';
    }
    echo '
    <div id="main-slider" class="py-3 row">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          '.$button.'
        </div>
        <div class="carousel-inner">
          '.$slides.'
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    ';
  }
?>