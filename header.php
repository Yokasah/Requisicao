<header id="header" style="position:absolute">
    <div class="d-flex flex-column">

        <div class="profile">
            <br>
			<?php if ( $_SESSION['login'] == 'true' ) { ?>

                <br>
                <br>

                <p align="center" class="text-light" text-uppercase"">Olá <?php echo( $_SESSION['nomeUser'] ); ?><?php
			} else {
				?>
                <h1 class="text-light"><a href="login.php">Login</a></h1> <?php
			} ?>
        </div>

		<?php if ( $_SESSION['login'] == 'true' )
		{
		?>
        <nav id="navbar" class="nav-menu navbar">
            <ul>
                <li><a href="index.php" class="nav-link scrollto"><i class="bx bx-home"></i> <span>Página Inicial</span></a>
                </li>
                <li><a href="requisicao.php" class="nav-link scrollto"><i class="bx bx-book-alt"></i>
                        <span>Requisições</span></a></li>

                <li><a href="manual.php" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Manual de Utilizador</span></a>
                </li>
				<?php
				}
				?>
                <li><a href="contactos.php" class="nav-link scrollto"><i class="bx bx-envelope"></i>
                        <span>Contactos</span></a></li>

				<?php if ( $_SESSION['tipoUser'] == 'Admin' ) { ?>
                    <li><a href="definicoes.php" class="nav-link scrollto"><i class="bx bx-car"></i>
                            <span>Administração</span></a></li>
					<?php
				}
				?>

				<?php if ( $_SESSION['login'] == 'true' ) { ?>
                    <li>
                        <a href=https://login.microsoftonline.com/{0}/oauth2/logout?post_logout_redirect_uri=https://www.sefo.pt/Requisicao/login.php?=id="logout"
                           class="nav-link scrollto"><i class="bx bx-log-out"></i> <span>Logout</span></a>
                    </li>
					<?php
				}
				?>

            </ul>
        </nav><!-- .nav-menu -->
    </div>
</header>