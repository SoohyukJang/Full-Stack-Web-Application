<?php ?>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid mx-5">
            <svg id="camera_logo" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-camera mx-3" viewBox="0 0 16 16">
                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
            </svg>
            <a href="index.php" class="navbar-brand"><h2>Insta Kilogram</h2></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar_collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbar_collapse">
                <div class="navbar-nav">
                    <a href="pagination.php" class="nav-item nav-link">User List</a>
                    <a href="index_admin.php" class="nav-item nav-link">Images</a>
                </div>
                <form class="d-flex my-3 mx-5 px-5">
                    <div class="input-group">                    
                        <input type="text" class="form-control" placeholder="Search">
                            <button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                            </button>
                    </div>
                </form>
                <div class="navbar-nav">
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </div>
</nav>

<?php ?>