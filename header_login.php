<?php ?>
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid mx-5">
        <a href="index.php" class="navbar-brand"><h2>InstaKilogram</h2></a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar_collapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbar_collapse">
          <form class="d-flex my-3 mx-5 px-5">
            <div class="input-group">                    
              <input type="text" class="form-control" placeholder="Search">
                <button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                </button>
            </div>
          </form>
          <div class="navbar-nav">
            <a href="my_account.php" class="nav-item nav-link">My Account</a>
          </div>
        </div>
    </div>
</nav>
<?php ?>