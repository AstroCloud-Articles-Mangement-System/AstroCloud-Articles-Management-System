<!-- Edit form -->
<div class="container" style="width:35% ;">
    <?php
    if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") {
        echo '<div id="alert-danger" class="alert alert-danger" role="alert">';
        echo '<ul></ul>';
        foreach ($_SESSION['error_message'] as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        unset($_SESSION['error_message']);
    }
    ?>
    <div class="card card-info" style="z-index:5;">
        <div class="card-header bg-info">
            <h3 class="card-title">Group Edit Form</h3>
        </div>
        <form action="/groups" method="post" style="z-index: 5;" id="vaildate_group_form" data-form-type="edit">
            <input type="hidden" name="group_id" value="<?php echo $group[0]['id']; ?>">
            <div class="card-body row">
                <div class="form-group col-12">
                    <div class="input-group my-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user-friends'></i></span>
                        </div>
                        <input type="text" id="name" name="name" class="form-control vaildate_input"
                            placeholder="Group Name" value="<?php echo $group[0]['group_name']; ?>" required>
                    </div>
                </div>
                <div class="form-group col-12">
                    <div class="mb-2" style="font-size: 18px;letter-spacing:1.5px;">Description</div>
                    <div>
                        <textarea class="form-control vaildate_input" placeholder="Group Description" rows="6" required><?php echo $group[0]['group_description']; ?>
                            </textarea>
                    </div>
                </div>
                <button type="submit" name="_method" value="PUT" class="btn btn-info bg-info btn-block">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- <script src="/views/dist/js/group_vaildation.js"></script> -->