<nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">MonArgent</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php?user_id=<?=$_SESSION['id']?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="mesDepenses.php?user_id=<?=$_SESSION['id']?>">Mes depenses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Statistiques</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>