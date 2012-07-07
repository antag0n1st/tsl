<div class="container o" style="">

    <div class="left">
     
            <h3>Пријавување за обука</h3>
            <p>Доколку Ви се потребни дополнителни информации за обука или конференција, Ве молиме пополнете го и испратете го формуларот:</p>
            <br />
            <!--
            Име и презиме
            Телефон*
            E-mail*
            Професија
            Компанија
            Отворена обука/конференција  (тука да има едно drop-down мени со обуките, конференциите  и академиите на трипле с)
            Коментар

            -->
            <form>
                
                <fieldset>
                    <label>Име и презиме</label><input type="text" name="name" />
                    <label>Телефон*</label><input type="text" name="phone" />
                    <label>E-mail*</label><input type="text" name="email" />
                    <label>Професија</label><input type="text" name="profession" />
                    <label>Компанија</label><input type="text" name="company" />
                    
                    <label>Отворена обука/конференција</label>
                    <select name="event">
                        <option>конференции</option>
                        <option>академии</option>
                    </select>
                    
                    <label>Коментар</label><textarea name="comment"></textarea>
                    
                    <input type="submit" class="button round" value="Испрати го формуларот" />
                </fieldset>
            </form>
                
                
                

    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
