<div class="navtop">
    <div class="navtop-left">
    <img src="../navbar/mechanic_kat.png" alt="Logo">
        <a href="http://localhost/QUICKFIX/Quick_Fix/home/">QuickFix</a>
    </div>
    <div class="navtop-right">
        <a href="/products">Products</a> <!--redirections from the navtop here-->
        <a href="/repairs">Repairs</a>
        <a href="../login/login.php">Login</a>
    </div>
</div>

<style>
.navtop {
    background-color: #2c3e50;
    padding: 30px;
    border-bottom: 1px solid #b2ebf2;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed; /* Make it stick to the top */
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Ensure it's above other elements */
}

.navtop-left {
    display: flex;
    align-items: center;
    gap: 10px;
}
.navtop-right {
    display: flex;
    align-items: center;
    gap: 10px;
    padding-right: 40px;
}

.navtop-left img {
    height: 50px;
}

.navtop-left a {
    color: #fff;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
}

.navtop-right a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    margin-left: 20px;
}

.navtop-right a:hover {
    color: #007bff;
}
</style>
