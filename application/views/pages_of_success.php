<?php $this->load->view('elements/slidebar'); ?>
<div class="container o" style="margin-top: 30px;">

    <div class="left">
     
            <h3>Страници на успех</h3>
            <?php if($finished_newsletters): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Наслов</th>
                        <th>Датум</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php $br=0; foreach($finished_newsletters as $newsletter): ?>
                    <tr <?php echo ($br++%2==0) ? 'class="odd"' : ''; ?> >
                        <td>
                            <a target="_balnk" href="<?php echo base_url().'newsletter/view/'.$newsletter->id; ?>">
                                <?php echo $newsletter->title; ?>
                            </a>
                        </td>
                        <td><?php echo TimeHelper::format($newsletter->date_finished); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <?php endif; ?>

    </div>

    <div class="right">
        <?php $this->load->view('elements/sidebar'); ?>
    </div>


</div>
