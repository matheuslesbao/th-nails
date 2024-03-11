<?php $this->layout('admin', ['title' => 'Login', 'style' => 'admin/login']) ?>



<main>
    <section>
        <div>
            <h3>Administração</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam hic, doloribus blanditiis</p>
        </div>
    <form action="" method="post">
    <h1>Login</h1>
    <label for="username">Username / Email</label>
    <input type="text" placeholder="email" name="email">
    <label for="password">Senha</label>
    <input type="password" placeholder="password"   name="password">
    <div class="container-btn">
    <input class="btn" type="submit" placeholder="SUBMIT">
    <a class="btn" href="/">Voltar</a>
    </div>
</form>
    </section>
</main>