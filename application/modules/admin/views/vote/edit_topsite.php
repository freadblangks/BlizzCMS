<?php
if (isset($_POST['button_updateTopsite'])):
  $name = $_POST['topsite_name'];
  $url = $_POST['topsite_url'];
  $time = $_POST['topsite_time'];
  $points = $_POST['topsite_points'];
  $image = $_POST['topsite_image'];

  $this->admin_model->updateSpecifyTopsite($idlink, $name, $url, $time, $points, $image);
endif; ?>
    <section class="uk-section uk-section-xsmall" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <div class="uk-grid uk-grid-small uk-margin-small" data-uk-grid>
          <div class="uk-width-expand uk-heading-line">
            <h3 class="uk-h3"><i class="fas fa-edit"></i> <?= $this->lang->line('card_title_edit_topsite'); ?></h3>
          </div>
          <div class="uk-width-auto">
            <a href="<?= base_url('admin/topsites'); ?>" class="uk-icon-button"><i class="fas fa-arrow-circle-left"></i></a>
          </div>
        </div>
        <div class="uk-card uk-card-default">
          <div class="uk-card-body">
            <form action="" method="post" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
              <div class="uk-margin-small">
                <div class="uk-grid uk-grid-small" data-uk-grid>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label uk-text-uppercase">Topsite <?= $this->lang->line('table_header_name'); ?></label>
                    <div class="uk-form-controls">
                      <input class="uk-input" name="topsite_name" type="text" placeholder="Name" value="<?= $this->admin_model->getTopsiteSpecifyName($idlink); ?>" required>
                    </div>
                  </div>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label uk-text-uppercase">Topsite URL</label>
                    <div class="uk-form-controls">
                      <input class="uk-input" name="topsite_url" type="url" placeholder="URL" value="<?= $this->admin_model->getTopsiteSpecifyURL($idlink); ?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <div class="uk-grid uk-grid-small" data-uk-grid>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('table_header_time'); ?> (Hours)</label>
                    <div class="uk-form-controls">
                      <input class="uk-input" name="topsite_time" type="number" min="1" placeholder="Hours" value="<?= $this->admin_model->getTopsiteSpecifyTime($idlink); ?>" required>
                    </div>
                  </div>
                  <div class="uk-inline uk-width-1-2@s">
                    <label class="uk-form-label uk-text-uppercase"><?= $this->lang->line('table_header_points'); ?></label>
                    <div class="uk-form-controls">
                      <input class="uk-input" name="topsite_points" type="number" min="1" placeholder="<?= $this->lang->line('table_header_points'); ?>" value="<?= $this->admin_model->getTopsiteSpecifyPoints($idlink); ?>" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <label class="uk-form-label uk-text-uppercase">URL Image</label>
                <div class="uk-form-controls">
                  <div class="uk-inline uk-width-1-1">
                    <input class="uk-input" name="topsite_image" type="url" placeholder="http://example.com/image.jpg" value="<?= $this->admin_model->getTopsiteSpecifyImage($idlink); ?>" required>
                  </div>
                </div>
              </div>
              <div class="uk-margin-small">
                <button class="uk-button uk-button-primary uk-width-1-1" name="button_updateTopsite" type="submit"><i class="fas fa-sync-alt"></i> <?= $this->lang->line('button_save'); ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>