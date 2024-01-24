<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
 
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "Bitcoin"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "Ethereum"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "dark",
  "isTransparent": false,
  "displayMode": "compact",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
<div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-money color-success border-success"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Total Profit</div>
                                    <div class="stat-digit text-success"><?php echo (getField('user','id', $_SESSION['Account_id'],'fund')) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">User Name</div>
                                    <div class="stat-digit text-primary"><?php echo (getField('user','id', $_SESSION['Account_id'],'name')) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Withdrawals</div>
                                    <div class="stat-digit"><?php echo (getField_count('withdraw','user_id', $_SESSION['Account_id'])) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="stat-widget-one">
                                <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                <div class="stat-content dib">
                                    <div class="stat-text">Current Package</div>
                                    <div class="stat-digit text-danger"><?php echo (getField('pack','id',$pack_id,'name')) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>