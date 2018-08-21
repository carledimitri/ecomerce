<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Ecommerce </title>
    <!-- CSS -->
  
    
</head>
<body>

        <?php require('header.php');  ?>

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">E-COMMERCE CONTACT</h1>
                <p class="lead text-muted mb-0">by Mouele Mouele Carle Dimitri !</p>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">acceuil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" rows="6" required></textarea>
                                </div>
                                <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                        <div class="card-body">
                            <p>429 rue  Nord Foire</p>
                            <p>11500 Dakar</p>
                            <p>Senegal</p>
                            <p>Email : email@example.com</p>
                            <p>Tel. +77 840 69 39</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require('footer.php');  ?>

</body>
</html>
