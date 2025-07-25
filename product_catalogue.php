<!DOCTYPE html>
<html lang="fr">
<body>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OG Tech PC - Catalogue</title>
    <?php 
      require_once "header.php";
      require_once "includes/product_catalogue.inc.php";
    ?>
  </head>

  <main >
    <div class="row" style="padding-top: 15px;">
      <div class="col s2 center">

        <div id="rgb_hover" style="position: fixed;">
          <form id="form-filter" action="" method="GET">
            <input type="hidden" name="query" value="<?php if(isset($_GET["query"])) 
              echo($_GET["query"]); ?>">

            <div class="section" style="margin-bottom: 100px;">
              <div class="col unglow">
                <ul id="filter_dropdown" class="dropdown-content black">
                  <li><a class="cyan-text page-title" onclick="select_category(this)">Réinitialiser</a></li>
                  <li><a class="cyan-text page-title" onclick="select_category(this)">Packs PC</a></li>
                  <li><a class="cyan-text page-title" onclick="select_category(this)">Moniteurs & Audio</a></li>
                  <li><a class="cyan-text page-title" onclick="select_category(this)">Périphériques</a></li>
                </ul>
                <a class="btn dropdown-trigger cyan" data-target="filter_dropdown" style="margin-top: 5px;">
                  <?php
                    $category = -1;
                    if (isset($_GET["category"])) $category = $_GET["category"];

                    if ($category != -1) echo(CATEGORY_NAMES[$category]);
                    else echo("Sélectionner une catégorie");
                    echo("<input type='hidden' name='category' value=$category>");
                  ?>
                  <i class="material-icons right">arrow_drop_down</i>
                </a>
              </div>
            </div>

            <div class="section" style="margin-bottom: 100px">
              <div class="col unglow">
                <ul id="sort_dropdown" class="dropdown-content black">
                  <li><a class="page-title" onclick="select_sort(this)">Réinitialiser</a></li>
                  <li><a class="page-title" onclick="select_sort(this)">Prix croissant</a></li>
                  <li><a class="page-title" onclick="select_sort(this)">Prix décroissant</a></li>
                </ul>
                <a class="btn dropdown-trigger" data-target="sort_dropdown" style="margin-top: 5px;">
                  <?php
                    $sort = -1;
                    if (isset($_GET["sort"])) $sort = $_GET["sort"];
                    if ($sort != -1) echo(SORT_NAMES[$sort]);
                    else echo("Sélectionner un tri");
                    echo("<input type='hidden' name='sort' value=$sort>");
                  ?>
                  <i class="material-icons right">arrow_drop_down</i>
                </a>
              </div>
            </div>

            <div class="section">
              <div class="col unglow">
                <ul id="choose_dropdown" class="dropdown-content black">
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Réinitialiser</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Asus</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">MSI</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Razer</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Logitech</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Viewsonic</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Acer</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">HyperX</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Steelseries</a></li>
                  <li><a class="cyan-text page-title" onclick="select_brand(this)">Corsair</a></li>
                </ul>
                <a class="btn dropdown-trigger cyan" data-target="choose_dropdown" style="margin-top: 5px;">
                  <?php
                    $brand = -1;
                    if (isset($_GET["brand"])) $brand = $_GET["brand"];

                    if ($brand != -1) echo(BRAND_NAMES[$brand]);
                    else echo("Sélectionner une marque");
                    echo("<input type='hidden' name='brand' value=$brand>");
                  ?>
                  <i class="material-icons right">arrow_drop_down</i>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col s9" style="margin-bottom: 80px">
        <!-- début de la liste des articles -->
        <?php
          searchItems($category, $brand, $sort);
        ?>
      </div>
    </div>
  </main>
</body>

<script>
  $(document).ready(() =>
  {
    form = document.getElementById("form-filter");
    category = document.getElementsByName("category")[0];
    brand = document.getElementsByName("brand")[0];
    sort = document.getElementsByName("sort")[0];
  });

  // dropdown
  var form, category, brand, sort, view;

  var categoryBy = {
    "Réinitialiser": -1,
    "Packs PC": 0,
    "Moniteurs & Audio": 1,
    "Périphériques": 2
  };

  var brandBy = {
    "Réinitialiser": -1,
    "Asus": 0,
    "MSI": 1,
    "Razer": 2,
    "Logitech": 3,
    "Viewsonic": 4,
    "Acer": 5,
    "HyperX": 6,
    "Steelseries": 7,
    "Corsair": 8
  }

  var sortBy = {
    "Réinitialiser": -1,
    "Prix croissant": 0,
    "Prix décroissant": 1
  };

  function select_category(selectedItem)
  {
    var categoryID = categoryBy[selectedItem.textContent];
    category.value = categoryID;
    form.submit();
  }

  function select_brand(selectedBrand)
  {
    var brandID = brandBy[selectedBrand.textContent];
    brand.value = brandID;
    form.submit();
  }

  function select_sort(selectedSort)
  {
    var sortID = sortBy[selectedSort.textContent];
    sort.value = sortID;
    form.submit();
  }
</script>
<?php include_once "footer.php"; ?>
</html>