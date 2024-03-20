<?php $this->layout('admin', ['title' => 'Dashboard', 'style' => 'admin/dashboard'])?>

<aside>
    <h1>DASHBOARD</h1>
    <div class="menu">
        <ul>
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/customer">Clientes</a></li>
        </ul>
    </div>
    <a class="btn" href="">Logout</a>
</aside>
<main>
    <section class="container-header">

        <h4>Faça o Cadastro dos Clientes</h4>
    </section>
    <section class="container-customers">
        <form action="/customer" method="post">
            <h1>Cadastro do clientes</h1>
            <label for="name">Cliente</label>
            <input type="text" placeholder="Nome" name="name">
            <br>
            <label for="address">Endereço</label>
            <input type="text" placeholder="Endereço" name="address">
            <br>
            <label for="number">Telefone\Celular</label>
            <input type="text" placeholder="(00) 99999-9999" name="number">
            <br>
            <div class="container-btn">
                <input class="btn" name="create" type="submit" placeholder="SUBMIT">
            </div>
        </form>
        <div class="container-customer-cards">
            <h1>Clientes</h1> <br>
            <?php if ($customers != null): ?>
            <?php foreach ($customers as $customer): ?>
                
                <div class="card-customer">
                    <div class="card-customer__info">
                        <img src="/assets/img/anonWoman.png" width="70px" alt="">
                        <div>
                            <p>Nome: <?php echo $customer['nome']; ?></p>
                            <p>Número: <?php echo $customer['telefone']; ?></p>
                            <p>Endereço: <?php echo $customer['address'] ?? 'Sem Endereço'; ?></p>
                        </div>
                    </div>

                    <div class="card-customer__info2">
                        <form action="/customer_delete" method="post">
                            <input type="hidden" name="id-del" value="<?=$customer['id']?>">
                            <button type="submit"
                            onclick="return confirm('Deseja deletar este cliente? <?=$customer['nome']?>')">
                                Deletar
                            </button>
                        </form>

                        <a href="https://api.whatsapp.com/send?phone=<?php echo $customer['telefone'];?>"
                             target="_blank">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
                        </a>
                    </div>
                </div>
            <?php endforeach;?>
            <?php else: ?>
    <br><p>Nenhum cliente encontrado.</p>
<?php endif; ?>
        </div>
    </section>

</main>