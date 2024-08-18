<?php
/**
 * DOC VARIABLE
 * @var string $title
 * @var string $searchTerm
 */
?>
    <h2> <?= $title ?> </h2>

    <div class="d-flex justify-content-center">
        <form method="post" action="?controller=product&action=search">
            <div class="form-group">
                <label class="form-label" for="searchEngine">Moteur de recherche</label>
                <input class="form-control" type="text" name="searchEngine" placeholder="ex : nom de la bd"">
                <button class=" btn btn-dark form-control mt-2 mb-5" type="submit">Search</button>
            </div>
        </form>
    </div>

<?php if (!empty($searchResults)) { ?>
    <?php foreach ($searchResults as $row) { ?>
        <div class="table-responsive-md">
            <table class="table align-middle table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Nom du produit</th>
                    <th>Auteur du produit</th>
                    <th>Prix</th>
                    <th></th>
                </tr>
                </thead>
                <tr>
                    <td class="col-md-2">
                        <?php if ($row['product_image'] != "") : ?>
                            <img src="/upload/product/lg_<?= $row['product_image']; ?>"
                                 alt="Couverture de la BD : <?= $row['product_name']; ?>" class="img-thumbnail "
                                 width="150px"/>
                        <?php else : ?>
                            <img src="/upload/product/no-img.png" class="img-thumbnail" width="150px">
                        <?php endif; ?>
                    </td>
                    <td class="col-md-2"><?= $row['product_name'] ?></td>
                    <td class="col-md-2"><?= $row['product_author'] ?></td>
                    <td class="col-md-2"><?= $row['product_price']; ?>€</td>
                    <td class="col-md-2">
                        <button class="btn btn-dark">Add to cart</button>
                    </td>
                </tr>
            </table>
        </div>
    <?php } ?>
<?php } else { ?>
    <p>Aucun résultat trouvé pour la recherche : <strong><?= $searchTerm ?></strong></p>
<?php } ?>