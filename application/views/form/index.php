<main>
    <h1>REGISTRO RED BULL RACING CAN</h1>

    <p>Regístrate en RedBull.com, dibuja y muéstranos el diseño de tu Racing Can de un auto a control remoto con
        carrocería hecha de latas de Red Bull, los 10 mejores diseños por ciudad serán elegidos por un jurado para
        recibir el chasis del auto y un kit para participar en los calificatorios para la final nacional.</p>

    <?php echo form_open('home/post',['id'=>'form']); ?>

        <div class="input-content">
            <label for="team">Nombre del Equipo: </label>
            <input type="text" name="team" id="team">
        </div>
        <div class="input-content">
            <label for="city">Ciudad: </label>
            <select name="city" id="city">
                <option value="">Ciudad</option>
                <option value="Monterrey">Monterrey</option>
                <option value="Tijuana">Tijuana</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Puebla">Puebla</option>
                <option value="D.F.">D.F.</option>
            </select>
        </div>

        <fieldset>
            <legend>Miembro 1 del equipo</legend>
            <div class="input-content">
                <label for="name-user">Nombre: </label>
                <input type="text" name="name-user" id="name-user" >
            </div>
            <div class="input-content">
                <label for="last-name">Apellido: </label>
                <input type="text" name="last-name" id="last-name" >
            </div>
            <div class="input-content">
                <label for="birthday">Fecha de nacimiento: </label>
                <input type="date" name="birthday" id="birthday" >
            </div>
            <div class="input-content">
                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email" >
            </div><div class="input-content">
                <label for="phone">Teléfono: </label>
                <input type="text" name="phone" id="phone" >
            </div>
            <div class="input-content">
                <label for="address">Dirección: </label>
                <input type="text" name="address" id="address" >
            </div>
            <div class="input-content">
                <label for="student_number">Número de estudiante universitario: </label>
                <input type="text" name="student_number" id="student_number" >
            </div>


        </fieldset>

        <fieldset>
        <legend>Miembro 2 del equipo</legend>
        <div class="input-content">
            <label for="name-user-2">Nombre: </label>
            <input type="text" name="name-user-2" id="name-user-2" >
        </div>
        <div class="input-content">
            <label for="last-name-2">Apellido: </label>
            <input type="text" name="last-name-2" id="last-name-2" >
        </div>
        <div class="input-content">
            <label for="birthday-2">Fecha de nacimiento: </label>
            <input type="date" name="birthday-2" id="birthday-2" >
        </div>
        <div class="input-content">
            <label for="email-2">E-mail: </label>
            <input type="text" name="email-2" id="email-2" >
        </div><div class="input-content">
            <label for="phone-2">Teléfono: </label>
            <input type="text" name="phone-2" id="phone-2" >
        </div>
        <div class="input-content">
            <label for="address-2">Dirección: </label>
            <input type="text" name="address-2" id="address-2" >
        </div>
        <div class="input-content">
            <label for="student_number-2">Número de estudiante universitario: </label>
            <input type="text" name="student_number-2" id="student_number-2" >
        </div>


    </fieldset>
        <input type="file">
        <button> GUARDAR </button>
    <?php echo form_fieldset_close();  ?>

</main>