<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php">Książkowy zakątek</a>
    <div class="navbar-header">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" 
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                    <a class="nav-link active" href="?page=2">Aktualności</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?page=5">Baza książek <span class="sr-only">(current)</span></a>
                </li>
                <?php  if(!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']=="yes")
            {
            echo  '<li class="nav-item active">
                    <a class="nav-link" href="mybooks.php">Moje książki <span class="sr-only">(current)</span></a>
                    </li>';
            }else
            {
               
            }?>
                </ul>
            
            <?php  if(!empty($_SESSION['loggedIn']) && $_SESSION['loggedIn']=="yes")
            {
                if($_SESSION['god']=="yes")
                {
                    echo        '<div class="dropdown">';
                    echo            '<button class="btn btn-outline-light auth-btn dropdown-toggle" type="button" id="dropdown5" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj</button>';
                        echo                '<div class="dropdown-menu" aria-labelledby="dropdown5">';
                        echo                    '<a class="dropdown-item" href="addArticle.php" role="button">Artykuł</a>';
                        echo                    '<a class="dropdown-item" href="addBook.php" role="button">Książkę</a>';
                        echo                '</div>';
                        echo '</div>';
                        
                   
                }
            echo    '<span class="auth-btn">';
            echo        '<div class="dropdown">';
            echo            '<button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" 
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' 
                             . $username = $_SESSION['username'] . '</button>';
            echo                '<div class="dropdown-menu" aria-labelledby="dropdownMenu2">';
            echo                    '<a class="dropdown-item" href="config/logout.php">Wyloguj</a>';
            echo                '</div>';
            echo        '</div>';
            echo    '</span>';
            }else
            {
            
            echo    '<span class="auth-btn">';
           
   			echo        '<div class="dropdown">';
            echo            '<button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" 
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Uwierzytelnienie
                            </button>';
            echo                '<div class="dropdown-menu" aria-labelledby="dropdownMenu2">';
            echo                    '<a class="dropdown-item" href="config/login.php">Zaloguj się</a>';
            echo                    '<a class="dropdown-item" href="config/register.php">Zarejestruj się</a>';
            echo                '</div>';
            echo        '</div>';
            echo    '</span>';
            }?>
        </div>
</div>


        </nav> <!--- END nav -->

