<?php
/**
 * Formulario calculadora "Calculadora Financiamiento"
 */
add_shortcode('kt-calc-financiamiento', function() {
    global $wp;
    $rand = 'ktcf'.date('YmdHis');
    $tasa = floatval(get_option('setting_tasa'));
    ?>

    <section class="section-calc-financiamiento">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="form-1 form-md form-calc-financiamiento form-ajax" method="post" id="form_<?php echo $rand; ?>" data-id="<?php echo $rand; ?>" novalidate>
                        <input type="hidden" name="tasa" id="tasa_<?php echo $rand; ?>" value="<?php echo $tasa; ?>">
                        <input type="hidden" name="action" value="form_financiamiento">
                        <input type="hidden" name="form" value="<?php echo __('Financiamiento de Vehículos','ktech'); ?>">
                        <input type="hidden" name="source" value="<?php echo home_url($wp->request); ?>">

                        <div class="kt-overlay d-none">
                            <div class="kt-overlay__inner">
                                <div class="kt-overlay__content"><span class="kt-spinner"></span></div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <h3><?php echo __('Seleccione el Vehículo','ktech'); ?></h3>
                                <select name="vehiculo" id="vehiculo_<?php echo $rand; ?>" class="form-control" required>
                                    <?php echo getVehiculos(); ?>
                                </select>
                                <div class="invalid-feedback" style="margin-top: -15px;">
                                    <?php echo __('Debe seleccionar el vehículo','ktech'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3><?php echo __('Elija el banco y la tasa de su preferencia:','ktech'); ?></h3>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label for=""><?php echo __('Seleccionar Banco','ktech'); ?></label>
                                <div class="drop-down">
                                    <div class="caption">&nbsp;</div>
                                    <div class="list">
                                        <?php
                                        $loop = new WP_Query([
                                            'post_status' => 'publish',
                                            'post_type'   => 'banco',
                                            'order'       => 'ASC',
                                        ]);
                                        ?>
                                        <?php if ( $loop->have_posts() ) : ?>
                                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                                <?php
                                                $ID     = get_the_ID();
                                                $title  = get_the_title();
                                                $imagen = wp_get_attachment_url(get_post_thumbnail_id($ID));
                                                $tasas  = get_field('tasas', $ID);
                                                $plazos = get_field('plazos', $ID);
                                                ?>
                                                <div class="item" data-title="<?php echo $title; ?>" data-tasas='<?php echo json_encode($tasas); ?>' data-plazos='<?php echo json_encode($plazos); ?>'>
                                                    <img src="<?php echo $imagen; ?>" alt="<?php echo $title; ?>">
                                                    <span><?php echo $title; ?></span>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; wp_reset_postdata(); ?>

                                    </div>
                                </div>
                                <input type="text" name="banco" id="banco_<?php echo $rand; ?>" required class="form-control d-none">
                                <div class="invalid-feedback" style="margin-top: 0;">
                                    <?php echo __('Debe seleccionar el banco','ktech'); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for=""><?php echo __('Seleccionar Tasa','ktech'); ?></label>
                                <select name="calc_tasa" id="calc_tasa_<?php echo $rand; ?>" class="form-control" required>
                                    <option value="">-</option>
                                </select>
                                <div class="invalid-feedback" style="margin-top: -15px;">
                                    <?php echo __('Debe seleccionar la tasa','ktech'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for=""><?php echo __('Elija el plazo del financiamiento:','ktech'); ?></label>
                                <select name="calc_plazo" id="calc_plazo_<?php echo $rand; ?>" class="form-control" required>
                                    <option value="">-</option>
                                </select>
                                <div class="invalid-feedback" style="margin-top: -15px;">
                                    <?php echo __('Debe seleccionar el plazo','ktech'); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <label for=""><?php echo __('Cuotas Extraordinarias opcionales:','ktech'); ?></label>
                                <input type="text" name="calc_cuota_extra" id="calc_cuota_extra_<?php echo $rand; ?>" class="form-control kt-currency" placeholder="<?php echo __('Monto Cuota RD$','ktech'); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3 class="m-0"><?php echo __('Valor del Vehículo:','ktech'); ?></h3>

                                <div class="vehicle-amount">
                                    <span class="usd">US$0.00</span>
                                    <span>/</span>
                                    <span class="dop">RD$0.00</span>
                                </div>

                                <input type="hidden" name="price_usd" id="price_usd_<?php echo $rand; ?>">
                                <input type="hidden" name="price_dop" id="price_dop_<?php echo $rand; ?>">
                                <input type="hidden" name="inicial_dop" id="inicial_dop_<?php echo $rand; ?>">
                                <input type="hidden" name="cuota_mensual" id="cuota_mensual_<?php echo $rand; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="line"></div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <h3 class="m-0"><?php echo __('Inicial a pagar:','ktech'); ?></h3>
                                <div class="initial-amount">RD$0.00</div>
                                
                                <input type="range" class="form-range" value="10" min="10" max="90" step="10" name="inicial" id="inicial_<?php echo $rand; ?>">
                                <div class="range-labels">
                                    <span data-value="10" class="active">10%</span>
                                    <span data-value="20">20%</span>
                                    <span data-value="30">30%</span>
                                    <span data-value="40">40%</span>
                                    <span data-value="50">50%</span>
                                    <span data-value="60">60%</span>
                                    <span data-value="70">70%</span>
                                    <span data-value="80">80%</span>
                                    <span data-value="90">90%</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="cuota-mensual">
                                    <?php echo __('Cuota Mensual: ','ktech'); ?>
                                    <span>RD$0.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3><?php echo __('Datos Personales','ktech'); ?></h3>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" name="nombre_completo" id="nombre_completo_<?php echo $rand; ?>" class="form-control" placeholder="<?php echo __('Nombres y Apellidos *','ktech'); ?>" required>
                                <div class="invalid-feedback" style="margin-top: -15px;">
                                    <?php echo __('Debe ingresar el nombre y apellido','ktech'); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <input type="text" name="celular" id="celular_<?php echo $rand; ?>" class="form-control" placeholder="<?php echo __('Celular o Teléfono *','ktech'); ?>" required>
                                <div class="invalid-feedback" style="margin-top: -15px;">
                                    <?php echo __('Debe agregar el número celular','ktech'); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="email" name="email" id="email_<?php echo $rand; ?>" class="form-control" placeholder="<?php echo __('e-mail*','ktech'); ?>" required>
                                <div class="invalid-feedback" style="margin-top: -15px;">
                                    <?php echo __('Debe agregar el e-mail','ktech'); ?>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <input type="text" name="cedula" id="cedula_<?php echo $rand; ?>" class="form-control" placeholder="<?php echo __('Número de Cédula','ktech'); ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon icon-submit-white"></i>
                                    <span><?php echo __('Enviar Solicitud','ktech'); ?></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    add_action('wp_footer', function() {
        ?>
        <script type="text/javascript">
            (function($) {
                $(document).ready(function () {
                    $('div.drop-down > .caption').on('click', function() {
                        $(this).parent().toggleClass('open');
                    });

                    $('div.drop-down > .list > .item').on('click', function() {
                        $('div.drop-down > .list > .item').removeClass('selected');
                        $(this).addClass('selected').parent().parent().removeClass('open').children('.caption').html( $(this).html() );
                        
                        $form.find('[name="calc_tasa"]').empty();
                        var tasas = $(this).data('tasas');
                        var tasas_html = ``;
                        $.each(tasas, function(key, item) {
                            tasas_html += `<option value="${item.valor}">${item.nombre}</option>`;
                        });
                        $form.find('[name="calc_tasa"]').append(tasas_html);
                        
                        $form.find('[name="calc_plazo"]').empty();
                        var plazos = $(this).data('plazos');
                        var plazos_html = ``;
                        $.each(plazos, function(key, item) {
                            if (item.valor > 1) var lbl = 'Años'; else var lbl = 'Año';
                            plazos_html += `<option value="${item.valor}">${item.valor} ${lbl}</option>`;
                        });
                        $form.find('[name="calc_plazo"]').append(plazos_html);
                        
                        $form.find('[name="banco"]').val($(this).data('title'));

                        calculo();
                    });

                    $(document).on('keyup', function(evt) {
                        if ( (evt.keyCode || evt.which) === 27 ) {
                            $('div.drop-down').removeClass('open');
                        }
                    });

                    $(document).on('click', function(evt) {
                        if ( $(evt.target).closest("div.drop-down > .caption").length === 0 ) {
                            $('div.drop-down').removeClass('open');
                        }
                    });
                    
                    function formatNumber(n) {
                        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                    }
                    
                    const $form  = $('.form-calc-financiamiento');
                    const tasa = parseFloat($form.find('[name="tasa"]').val());
                    const $range = $form.find('.form-range');
                    const $vehiculo = $form.find('[name="vehiculo"]');
                    const $extra = $form.find('[name="calc_cuota_extra"]');
                    const $tasa = $form.find('[name="calc_tasa"]');
                    const $plazo = $form.find('[name="calc_plazo"]');
                    
                    $range.on('change', function() {
                        var id = $(this).attr('id');
                        var val = $(this).val();
                        var $labels = $(this).siblings('.range-labels');
                        var $span = $labels.find('span[data-value="'+val+'"]');
                        $labels.find('span').removeClass('active');
                        $span.addClass('active');
                        var $label = $('#label_' + id);
                        var text = $span.text();
                        var value = text;
                        $label.html(value);

                        calculo();
                    });

                    $vehiculo.on('change', function() {
                        var price = parseFloat($(this).find('option:selected').data('price'));
                        var price_formatted_usd = 'US$' + formatNumber(String(price));
                        var price_formatted_dop = 'RD$' + formatNumber(String(tasa * price));

                        $form.find('.vehicle-amount .usd').html(price_formatted_usd);
                        $form.find('.vehicle-amount .dop').html(price_formatted_dop);
                        $form.find('[name="price_usd"]').val(price)
                        $form.find('[name="price_dop"]').val(parseFloat((tasa * price)).toFixed(0));

                        calculo();
                    });
                    
                    $extra.on('change', function() {
                        calculo();
                    });
                    
                    $tasa.on('change', function() {
                        calculo();
                    });
                    
                    $plazo.on('change', function() {
                        calculo();
                    });

                    let clearCurrency = (str) => {
                        var arr = str.split(' ');
                        var amount = 0;
                        if (arr[1]) {
                            amount = arr[1].replaceAll(',', '');
                        }

                        return parseFloat(amount);
                    }

                    function calculo() {
                        var price_dop = parseFloat($form.find('[name="price_dop"]').val());
                        var inicial_percent = parseFloat($form.find('[name="inicial"]').val());
                        var inicial_amount = parseFloat((price_dop * inicial_percent / 100)).toFixed(0);
                        $form.find('[name="inicial_dop"]').val(inicial_amount);
                        $form.find('.initial-amount').html('RD$' + formatNumber(inicial_amount));
                        
                        var calc_tasa      = parseFloat($form.find('[name="calc_tasa"]').val());
                        var calc_plazo     = parseInt($form.find('[name="calc_plazo"]').val());
                        var calc_inicial   = parseFloat($form.find('[name="inicial_dop"]').val());
                        var calc_extra     = clearCurrency($form.find('[name="calc_cuota_extra"]').val());
                        var calc_price     = parseFloat($form.find('[name="price_usd"]').val());
                        var calc_price_dop = parseFloat($form.find('[name="price_dop"]').val());
                        var ir             = calc_tasa / 100 / 12;
                        var np             = calc_plazo * 12;
                        var pv             = calc_price_dop - (calc_inicial + calc_extra);
                        var total          = Math.abs(PMT(ir, np, pv)).toFixed(0);
                        $form.find('[name="cuota_mensual"]').val(parseFloat(total));
                        $form.find('.cuota-mensual span').html('RD$' + formatNumber(String(total)));
                    }
                });
            })( jQuery );

            function PMT(ir, np, pv, fv, type) {
                /**
                 * ir   - interest rate per month
                 * np   - number of periods (months)
                 * pv   - present value
                 * fv   - future value
                 * type - when the payments are due:
                 *        0: end of the period, e.g. end of month (default)
                 *        1: beginning of period
                */
                var pmt, pvif;

                fv || (fv = 0);
                type || (type = 0);

                if (ir === 0)
                    return -(pv + fv)/np;

                pvif = Math.pow(1 + ir, np);
                pmt = - ir * pv * (pvif + fv) / (pvif - 1);

                if (type === 1)
                    pmt /= (1 + ir);

                return pmt;
            }

            function formatMoney(number, decPlaces, decSep, thouSep) {
                decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
                decSep = typeof decSep === "undefined" ? "." : decSep;
                thouSep = typeof thouSep === "undefined" ? "," : thouSep;
                var sign = number < 0 ? "-" : "";
                var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
                var j = (j = i.length) > 3 ? j % 3 : 0;

                return sign +
                    (j ? i.substr(0, j) + thouSep : "") +
                    i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
                    (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
            }
        </script>
        <?php
    });
});

add_action('wp_head', function() { ?>
    <style>
        /* DROPDOWN */
        div.drop-down {
            position: relative;
        }
        div.drop-down > div.caption {
            background-color: #fff;
            padding: 0 20px;
            height: 54px;
            display: flex;

            align-items: center;
            border-radius: 0;
            cursor: pointer;
            border: 1px solid #aaa;
        }
        div.drop-down > div.caption {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-input-caret.svg');
            background-position: calc(100% - 20px) center;
            background-repeat: no-repeat;
            background-size: auto;
        }
        div.drop-down > div.caption > span {
            margin-left: 10px;
            font-size: 14px;
            line-height: 20px;
        }
        div.drop-down > div.list {
            position: absolute;
            background-color: #fff;
            width: 100%;
            border-radius: 0 0 0 0;
            display: none;
            z-index: 1;
            border-bottom: 1px solid #aaa;
            border-left: 1px solid #aaa;
            border-right: 1px solid #aaa;
        }
        div.drop-down > div.list > div.item {
            padding: 11px 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        div.drop-down > div.list > div.item.selected {
            font-weight: bold;
        }
        div.drop-down > div.list > div.item span {
            font-size: 14px;
            line-height: 20px;
            margin-left: 10px;
        }
        div.drop-down.open > div.caption {
            border-radius: 0 0 0 0;
            border-bottom: none;
        }
        div.drop-down.open > div.list {
            display: block;
        }
    </style>
<?php });
