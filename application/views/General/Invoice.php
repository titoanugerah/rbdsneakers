<!DOCTYPE html>
<html lang="en" id="contnet">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $webConf->office_name; ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/img/icon.ico" type="image/x-icon"/>
	<script src="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
	WebFont.load({
		google: {"families":["Lato:300,400,700,900"]},
		custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/fonts.min.css']},
		active: function() {
			sessionStorage.fonts = true;
		}
	});
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/atlantis.min.css">
	<link rel="stylesheet" href="<?php echo base_url('./assets/template/AtlantisLite/'); ?>assets/css/demo.css">
	<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap2/bootstrap-switch.css"  />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
</head>

<div class="card-header">
    <div class="invoice-header">
        <h3 class="invoice-title">
            Invoice
        </h3>
        <div class="invoice-logo">
            <img src="../assets/img/examples/logoinvoice.svg" alt="<?php echo $webconf->office_name;?>">
        </div>
    </div>
    <div class="invoice-desc">
        <?php echo $webconf->office_address; ?><br>
        <?php echo $webconf->office_phone_number; ?>
    </div>
</div>
<div class="card-body">
    <div class="separator-solid"></div>
    <div class="row">
        <div class="col-md-4 info-invoice">
            <h5 class="sub">Date</h5>
            <p><?php echo $order->DateTime; ?></p>
        </div>
        <div class="col-md-4 info-invoice">
            <h5 class="sub">Invoice ID</h5>
            <p><?php echo '#RBD'.$order->Id; ?></p>
        </div>
        <div class="col-md-4 info-invoice">
            <h5 class="sub">Invoice To</h5>
            <p>
            <?php echo $order->CustomerName.' ( '.$order->CustomerPhone.' ) '; ?><br><?php echo $order->DeliveryAddress; ?> 
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-detail">
                <div class="invoice-top">
                    <h3 class="title"><strong>Order summary</strong></h3>
                </div>
                <div class="invoice-item">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0; foreach($detailOrder as $item):   ?>
                                <tr>
                                    <td><?php echo $item->Product; ?></td>
                                    <td class="text-center"><?php echo 'Rp. '.number_format($item->Price,2); ?></td>
                                    <td class="text-center"><?php echo $item->Qty; ?></td>
                                    <td class="text-right"><?php echo 'Rp. '.number_format($item->Total,2); $subtotal = $subtotal+$item->Total; ?></td>
                                </tr>
                                <?php endforeach;?>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center"><strong>Total</strong></td>
                                    <td class="text-right">Rp. <?php echo number_format($subtotal,2);?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>	
            <div class="separator-solid  mb-3"></div>
        </div>	
    </div>
</div>
<div class="card-footer">
    <div class="row">
        <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to">
            <h5 class="sub">Bank Transfer</h5>
            <div class="account-transfer">
                <div><span>Account Name:</span><span><?php echo $webconf->bank_user;?></span></div>
                <div><span>Account Number:</span><span><?php echo $webconf->bank_account;?></span></div>
                <div><span>Bank Name:</span><span><?php echo $webconf->bank_name;?></span></div>
            </div>
        </div>
        <div class="col-sm-5 col-md-7 transfer-total">
            <h5 class="sub">Total Amount</h5>
            <div class="price">Rp. <?php echo number_format($subtotal,2);?></div>
        </div>
    </div>
    <div class="separator-solid"></div>
    <h6 class="text-uppercase mt-4 mb-3 fw-bold">
        Notes
    </h6>
    <p class="text-muted mb-0">
        We really appreciate your business and if there's anything else we can do, please let us know! Also, should you need us to add VAT or anything else to this order, it's super easy since this is a template, so just ask!
    </p>
</div>
<script src="<?php echo base_url('assets/template/AtlantisLite/'); ?>/assets/js/core/jquery.3.2.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

<script>
 function download(){
    var doc = new jsPDF();
    var elementHTML = $('#contnet').html();
    var specialElementHandlers = {
        '#elementH': function (element, renderer) {
            return true;
        }
    };
    doc.fromHTML(elementHTML, 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });

    // Save the PDF
    doc.save('sample-document.pdf');
}
</script>                                    
</html>