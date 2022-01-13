<?php $title = 'To Do List';?>

<?php ob_start(); ?>

<div class="title">
    <h1>To Do List:</h1>
</div>


<div class="contenair-fluid" id="bgInput">

    <form action="index.php?action=addToDo" method="post" class="row p-3 d-flex justify-content-center">
        <input class="form-control form-control-lg col-6 w-75" type="text" placeholder="Insérez vos choses à faire" aria-label=".form-control-lg example" name="todo">


        <input type="submit" value="Ajouter" class="btn btn-secondary btn-lg col-4 pt-3">
    </form>

    <!-- CREATION OF TODO TAB -->
    <div class="row p-3 d-flex justify-content-center">

        <ul class="list-group list-group-flush col-6">
            <?php
            while ($data = $resp->fetch()) {
            ?>
                <li class="list-group-item"><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <label class="form-check-label" for="inlineCheckbox1"><?php echo $data['todo'] ?></label>
                        <div class="btn-group me-2" id="btnGroupAddon2" role="group" aria-label="Second group">

                            <a href="index.php?id=<?php echo $data['id'] ?>">
                                <button type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg>
                                </button>
                            </a>

                        </div>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <a href="index.php?action=truncate" class="row p-3 d-flex justify-content-center">
        <button type="button" class="btn btn-dark col-4 pt-3">Tout supprimer</button>
    </a>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>