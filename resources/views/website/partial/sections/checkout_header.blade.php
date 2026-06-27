<header id="header">
            <div class="middle_header">
				<div class="container">
					<div class="d-flex align-items-center states_mo">
						<div class="logo_site">
							<a href="index.html"><img src="img/logo.png" alt="إيدي ستور"></a>
						</div>
                        <div class="steps clearfix">
                            <ul role="tablist">
                                <li role="tab" class="first  
                                @if ($page == 1)
                                    current
                                @endif 
                                @if ($page == 2 || $page == 3)
                                    done
                                @endif">
                                    <a id="steps-uid-0-t-0" href="#step1">
                                        <span class="number"></span>
                                        <span class="step-order">معلومات الشحن</span>
                                    </a>
                                </li>
                                <li role="tab" class="disabled 
                                @if ($page == 2)
                                    current
                                @endif">
                                    <a id="steps-uid-0-t-1" href="#step2">
                                        <span class="number"></span>
                                        <span class="step-order">معلومات الدفع</span>
                                    </a>
                                </li>
                                <li role="tab" class="disabled last
                                @if ($page == 3)
                                    current
                                @endif">
                                    <a id="steps-uid-0-t-3" href="#step3">
                                        <span class="number"></span>
                                        <span class="step-order">مراجعة الطلب</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="safe_pay mr-auto">
                              <h4><img src="img/lock.svg" alt=""> دفع آمن ومحمي </h4>
                        </div>
					</div>
				</div>
			</div>
</header>