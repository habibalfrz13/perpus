<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use yii\web\UrlManager;

// page guide
// Admin 87
// Operator

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?= $this->render('css') ?>
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">


  <?php $this->beginBody() ?>
  <main role="main" class="flex-shrink-0">

    <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Navbar Search -->

          <!-- Messages Dropdown Menu -->

          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>

          <li>
            <?php

            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])

              . Html::submitButton(
                'Logout',
                ['class' => 'btn btn-primary']
              )
              . Html::endForm();
            ?>
          </li>
        </ul>
      </nav>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <!-- Sidebar -->

        <!-- Admin -->
        <?php if (Yii::$app->user->identity->role == 'admin') { ?>

          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="<?= Url::toRoute(['/../template/adminLTE/dist/img/user1-128x128.jpg']); ?>" alt="" class="img-circle elevation-2">

              </div>
              <div class="info">
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="nav-link">
                  <h4><?= Yii::$app->user->identity->username ?></h4>
                </a>
              </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                <!-- User -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas bi bi-people "></i>
                    <p>
                      Data User
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['/user/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          User
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['/teknisi/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-success"></i>
                        <p>
                          Teknisi
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['/teknisi/index2']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-success"></i>
                        <p>
                          Operator
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['/pelanggan/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-info"></i>
                        <p>
                          Pelanggan
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- AC -->
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="nav-icon fas bi bi-fan "></i>
                    <p>
                      Data AC
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['kondisi-ac/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Kondisi AC
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['merk-ac/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Merk Ac
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Point -->
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="nav-icon fas bi bi-database "></i>
                    <p>
                      Data Point
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['point-master/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Point Master
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['point-konversi/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Point Konversi
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>


                <!-- Order -->
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="nav-icon fas bi bi-bag-dash-fill "></i>
                    <p>
                      Data Order
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['order-display/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Order Display
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['order-kondisi/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Order Kondisi
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['order-history/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Order History
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- FeedBack -->
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="nav-icon fas bi bi-list-check "></i>
                    <p>
                      Data FeedBack
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['feedback/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          FeedBack
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['foto-feedback/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Foto FeedBack
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Data Alamat -->
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="nav-icon fas bi bi-map-fill "></i>
                    <p>
                      Data Alamat
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['alamat-kategori/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          kategori Alamat
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['alamat/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Detail Alamat
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Data Notifikasi -->
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="nav-icon fas bi bi-bell "></i>
                    <p>
                      Data Notifikasi
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['notifikasi-order/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Notifikasi Order
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['notifikasi-point/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Notifikasi Point
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>

                <!-- Data Invoice -->
                <li class="nav-item">
                  <a href="#" class="nav-link">

                    <i class="nav-icon fas bi bi-receipt "></i>
                    <p>
                      Data Invoice
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['invoice/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Invoice
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= Yii::$app->urlManager->createUrl(['invoice-detail/index']) ?>" class="nav-link">
                        <i class="far fa-circle nav-icon text-danger"></i>
                        <p>
                          Detail Invoice
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="<?= Yii::$app->urlManager->createUrl(['layanan/index']) ?>" class="nav-link">
                    <i class="nav-icon fas bi bi-layout-wtf"></i>
                    <p>
                      Data layanan
                    </p>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">
        <div class="container-fluid">
          <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
          ]) ?>
          <?= Alert::widget() ?>
          <?= $content ?>

        </div>
      </div>
  </main>

<?php } ?>


<!-- Operator -->



<?php if (Yii::$app->user->identity->role == 'operator') { ?>

  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= Url::toRoute(['/../template/adminLTE/dist/img/user1-128x128.jpg']); ?>" alt="" class="img-circle elevation-2">

      </div>
      <div class="info">
        <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="nav-link">
          <h4><?= Yii::$app->user->identity->username ?></h4>
        </a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas bi bi-people "></i>
            <p>
              Data User
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['/user/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  User
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['/teknisi/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-success"></i>
                <p>
                  Teknisi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['/teknisi/index2']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-success"></i>
                <p>
                  Operator
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['/pelanggan/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-info"></i>
                <p>
                  Pelanggan
                </p>
              </a>
            </li>
          </ul>
        </li>
        <!-- Point -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-database "></i>
            <p>
              Data Point
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['topup/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Topup
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['point-history/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  History Point
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['point-master/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Point Master
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['point-konversi/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Point Konversi
                </p>
              </a>
            </li>
          </ul>
        </li>


        <!-- Order -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-bag-dash-fill "></i>
            <p>
              Data Order
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['order-display/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Order Display
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['order-kondisi/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Order Kondisi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['order-history/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Order History
                </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- FeedBack -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-list-check "></i>
            <p>
              Data FeedBack
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['feedback/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  FeedBack
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['foto-feedback/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Foto FeedBack
                </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Alamat -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-map-fill "></i>
            <p>
              Data Alamat
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['alamat-kategori/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  kategori Alamat
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['alamat/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Detail Alamat
                </p>
              </a>
            </li>
          </ul>
        </li>


        <!-- Data Invoice -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-receipt "></i>
            <p>
              Data Invoice
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['invoice/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Invoice
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['invoice-detail/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Detail Invoice
                </p>
              </a>
            </li>
          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>





  <div class="content-wrapper">
    <div class="container-fluid">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>

    </div>


  </div>


  </main>

  </ul>
  </nav>
  </div>

<?php } ?>


<!-- Teknisi -->

<?php if (Yii::$app->user->identity->role == 'teknisi') { ?>

  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= Url::toRoute(['/../template/adminLTE/dist/img/user1-128x128.jpg']); ?>" alt="" class="img-circle elevation-2">

      </div>
      <div class="info">
        <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="nav-link">
          <h4><?= Yii::$app->user->identity->username ?></h4>
        </a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">




        <!-- Point -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas bi bi-database "></i>
            <p>
              Data Point
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['topup/create']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Top Up Point
                </p>
              </a>
            </li>
          </ul>
        </li>


        <!-- Order -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas bi bi-bag-dash-fill "></i>
            <p>
              Data Order
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['order-display/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Data Order
                </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- FeedBack -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas bi bi-list-check "></i>
            <p>
              Data FeedBack
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['feedback/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  FeedBack
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['foto-feedback/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Foto FeedBack
                </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Data Alamat -->

        <!-- Data Invoice -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-receipt "></i>
            <p>
              Data Invoice
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['invoice/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Invoice
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['invoice-detail/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Detail Invoice
                </p>
              </a>
            </li>
          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>





  <div class="content-wrapper">
    <div class="container-fluid">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>

    </div>


  </div>


  </main>

  </ul>
  </nav>
  </div>

<?php } ?>
<?php if (Yii::$app->user->identity->role == 'customer') { ?>

  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= Url::toRoute(['/../template/adminLTE/dist/img/user1-128x128.jpg']); ?>" alt="" class="img-circle elevation-2">

      </div>
      <div class="info">
        <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="nav-link">
          <h4><?= Yii::$app->user->identity->username ?></h4>
        </a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <li class="nav-item">
          <a href="<?= Yii::$app->urlManager->createUrl(['/pelanggan/index']) ?>" class="nav-link">
            <i class="far fa-circle nav-icon text-info"></i>
            <p>
              Profil
            </p>
          </a>
        </li>


        <!-- Order -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-bag-dash-fill "></i>
            <p>
              Data Order
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['order-display/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Create Order
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['order-history/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  History Order
                </p>
              </a>
            </li>
          </ul>
        </li>

        <!-- FeedBack -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-list-check "></i>
            <p>
              Data FeedBack
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['feedback/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  FeedBack
                </p>
              </a>
            </li>

          </ul>
        </li>

        <!-- Data Alamat -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-map-fill "></i>
            <p>
              Data Alamat
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['alamat/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Alamat
                </p>
              </a>
            </li>
          </ul>
        </li>


        <!-- Data Invoice -->
        <li class="nav-item">
          <a href="#" class="nav-link">

            <i class="nav-icon fas bi bi-receipt "></i>
            <p>
              Data Invoice
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['invoice/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Invoice
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Yii::$app->urlManager->createUrl(['invoice-detail/index']) ?>" class="nav-link">
                <i class="far fa-circle nav-icon text-danger"></i>
                <p>
                  Detail Invoice
                </p>
              </a>
            </li>
          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>





  <div class="content-wrapper">
    <div class="container-fluid">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>

    </div>


  </div>


  </main>

  </ul>
  </nav>
  </div>

<?php } ?>



<footer class="main-footer">
  <div class="container">
    <p class="float-start">&copy; 2023</p>
    <p class="float-end">@Argenesia</p>
  </div>
</footer>

<?php $this->endBody() ?>
<?= $this->render('js') ?>
</body>

</html>
<?php $this->endPage();
