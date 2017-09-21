<?php
Class Params{
	const DATE_FORMAT = 'dd M yy';      //format default date untuk datepicker
    const TIME_FORMAT = 'H:i:s';        //format default time untuk datepicker
    const MONTH_FORMAT = 'M yy';        //format untuk monthpicker

    const TOOLTIP_PLACEMENT = 'bottom';                 //nilai konstanta tooltip placement untuk bootstrap tooltip
    const TOOLTIP_SELECTOR = 'a[rel="tooltip"],button[rel="tooltip"],input[rel="tooltip"]';        //nilai konstanta tooltip selector untuk bootstrap tooltip

    const KATEGORI_PEMAKAI_ADMIN = 1;
    const KATEGORI_PEMAKAI_KASIR = 2;
	
    public static function menu()
    {
        return array(
            array(
                'label'=>'Dashboard',
				'url'=>'/dashboard',
                'icon'=>'entypo-gauge',
            ),
            array(
                'label'=>'Master',
				'index'=>0,
                'sub'=>array(
					array('label'=>'Kategori Pemakai', 'url'=>'/kategoriPemakai'),
                    array('label'=>'Cotoh Template Master', 'url'=>'dashboard/contohMaster'),
                ),
                'icon'=>'entypo-book',
            ),
            array(
                'label'=>'Transaksi',
                'sub'=>array(
                    array('label'=>'Cotoh Template Transaksi', 'url'=>'dashboard/contohTransaksi'),
                ),
                'icon'=>'entypo-pencil',
            ),
			array(
                'label'=>'Informasi',
                'sub'=>array(
                    array('label'=>'Cotoh Template Informasi', 'url'=>'dashboard/contohInformasi'),
                ),
                'icon'=>'entypo-list',
            ),
			array(
                'label'=>'Laporan',
                'sub'=>array(
					array('label'=>'Cotoh Template Laporan', 'url'=>'dashboard/contohLaporan'),
                ),
                'icon'=>'entypo-chart-bar',
            ),
        );
    }
}