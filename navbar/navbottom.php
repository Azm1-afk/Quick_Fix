<div class="navbottom">
    <div class="navbottom-content">
        <p>&copy; <?php echo date("Y"); ?> QuickFix. All rights reserved.</p>
        <a href="/privacy">Privacy Policy</a> | <a href="/terms">Terms of Service</a>
    </div>
</div>

<style>
.navbottom {
    background-color: #2c3e50;
    color: #fff;
    padding: 20px;
    text-align: center;
    border-top: 1px solid #34495e;
    /* Make it stick to the bottom */
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

.navbottom-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.navbottom-content p {
    margin-bottom: 10px;
    font-size: 0.9em;
}

.navbottom-content a {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
    font-size: 0.9em;
}

.navbottom-content a:hover {
    text-decoration: underline;
}

@media (max-width: 600px) {
    .navbottom-content {
        flex-direction: column;
    }
    .navbottom-content a {
        margin: 5px 10px;
    }
}
</style>
