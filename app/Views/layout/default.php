<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/js/jquery-3.6.2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= site_url('/') ?>">AudioAisle</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?= (service('request')->uri->getSegment(1) == 'home') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('/') ?>">HOME</a>
            </li>
            <li class="nav-item <?= (service('request')->uri->getSegment(1) == 'vinyls') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('/vinyls') ?>">VINYLS</a>
            </li>
            <li class="nav-item <?= (service('request')->uri->getSegment(1) == 'cart') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('/cart') ?>">CART</a>
            </li>
            <?php if(auth()->loggedIn()): ?>
                <?php if(auth()->user()->status == 'admin'): ?>
                    <li class="nav-item <?= (service('request')->uri->getSegment(1) == 'admin') ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= site_url('/admin') ?>">ADMIN</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_to('logout') ?>">LOGOUT</a>
                </li>
            <?php else: ?>
                <li class="nav-item <?= (service('request')->uri->getSegment(1) == 'register') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= url_to('register') ?>">REGISTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= url_to('login') ?>">LOGIN</a>
                </li>
            <?php endif; ?>
        </ul>
        <div class="input-group" style="max-width: 200px;">
            <form action="<?= base_url('search'); ?>" method="post" class="d-flex align-items-center position-relative">
                <input type="search" name="search" id="searchInput" class="form-control rounded" placeholder="SEARCH" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init><i class="fas fa-search"></i></button>
                <div id="suggestionsDropdown" class="dropdown-menu position-absolute w-100" style="display: none;"></div>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <!-- Content Section -->
    <?= $this->renderSection("content") ?>
</div>

<?= $this->include('layout/footer.php') ?>

<script src="<?= base_url('assets/js/jquery-3.6.2.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var query = $(this).val();
            if (query.trim() === '') {
                $('#suggestionsDropdown').hide();
                return;
            }
            $.ajax({
                url: '<?= base_url('search/suggest') ?>',
                type: 'GET',
                data: { query: query },
                success: function(response) {
                    var suggestions = response;
                    var dropdown = $('#suggestionsDropdown');
                    dropdown.empty();
                    if (suggestions.length > 0) {
                        suggestions.forEach(function(suggestion) {
                            dropdown.append('<a class="dropdown-item" href="<?= site_url('/vinyls/vinylDetails/') ?>' + suggestion.id + '">' + suggestion.name + '</a>');
                            
                            dropdown.append('<a class="dropdown-item" href="<?= site_url('/vinyls/vinylDetails/') ?>' + suggestion.id + '">' + suggestion.artist + '</a>');

                        });
                        dropdown.show();
                    } else {
                        dropdown.hide();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching suggestions:', error);
                }
            });
        });

        // Hide dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#suggestionsDropdown').length) {
                $('#suggestionsDropdown').hide();
            }
        });
    });
</script>

</body>
</html>
