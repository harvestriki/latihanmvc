<html>
    <head>
        <title>
            Sistem informasi perpustakaan
        </title>
    </head>
    <body>
        <h2>SISTEM INFORMASI PERPUSTAKAAN</h2>
        <h1>Tambah Anggota</h1>
        <hr/>
        <div id="formlogin">
            <form name="anggota" method="post">
                <div class="label">Nama</div>
                <div class="field"><input type="text" name="nama"/></div>
                <div class="label">E-Mail</div>
                <div class="field"><input type="text" name="email"/></div>
                <div class="label">User ID</div>
                <div class="field"><input type="user_id" name="user_id"/></div>
                <div class="label">Password</div>
                <div class="field"><input type="password" name="password"/></div>
                <div class="label">Jenis</div>
                <div>
                    <select name="jenis">
                        <option value="Admin">Admin</option>
                        <option value="Anggota">Anggota</option>
                    </select>
                </div>
                <hr/>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </body>
</html>
