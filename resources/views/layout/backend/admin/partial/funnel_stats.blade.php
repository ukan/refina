<hr class="separator" />

<div class="sidebar-widget widget-stats">
	<div class="widget-header">
		<h6>MY PLAN</h6>
		<div class="widget-toggle">+</div>
	</div>
	<div class="widget-header">
		<br>
		<center>			
			@if(user_info('status_account_name') == 'Active')
				<label class="label label-success" style="font-size:15px">Status : {{ user_info('status_account_name') }}</label>
			@elseif(user_info('status_account_name') == 'Banned')
				<label class="label label-danger" style="font-size:15px">Status : {{ user_info('status_account_name') }}</label>
			@elseif(user_info('status_account_name') == 'Suspended')
				<label class="label label-warning" style="font-size:15px">Status : {{ user_info('status_account_name') }}</label>
				<br><br>
				<a onclick="javascript:action_activate('{{ user_info("id") }}')" class="btn btn-primary">Activate</a>
			@else
				<label class="label label-primary" style="font-size:15px">Status : {{ user_info('status_account_name') }}</label>
			@endif
		</center>
		<!-- Close Active Suspend -->
		
	</div>
	<div class="widget-content">
		<ul>

			<li style="margin-bottom:15px">
				<span class="stats-title"><h4>Plan</h4></span>
			</li>
			<li style="margin-bottom:15px">
				<div>
					<center><img src="{{ getPlan(user_info('plan_id'),'image_path') }}" style="width:50%;height:auto;" class="img-reponsive"></center>
				<span class="stats-title"><b>Scoido</b></span>
				<span class="stats-complete text-white">{{ user_info('plan') }} ( {{ web_attr_member_area('percent_bar_plan') }}% )</span>
				<div class="progress">
					<div class="progress-bar progress-bar-success progress-without-number" role="progressbar" aria-valuenow="{{ web_attr_member_area('percent_bar_plan') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ web_attr_member_area('percent_bar_plan') }}%;">
						<span class="sr-only">{{ web_attr_member_area('percent_bar_plan') }}% Complete</span>
					</div>
				</div>
				</div>
			</li>
			<li style="margin-bottom:15px">
				<span class="stats-title"><b>Funnels</b></span>
				<span class="stats-complete text-white">{{ get_funnel_status('funnel_limit') }}</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="{{ get_funnel_status('funnel_limit_percent') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ get_funnel_status('funnel_limit_percent') }}%;">
						<span class="sr-only">{{ get_funnel_status('funnel_limit_percent') }}% Complete</span>
					</div>
				</div>
			</li>
			<li style="border-bottom:2px solid #ccc;margin-bottom:15px">
				<span class="stats-title"><b>Pages</b></span>
				<span class="stats-complete text-white">{{ get_funnel_status('page_limit') }}</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="{{ get_funnel_status('page_limit_percent') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ get_funnel_status('page_limit_percent') }}%;">
						<span class="sr-only">{{ get_funnel_status('page_limit_percent') }}% Complete</span>
					</div>
				</div>
			</li>
			<li style="margin-bottom:15px">
				<span class="stats-title"><h4>Autoresponder</h4></span>
			</li>
			<li style="margin-bottom:15px">
				<span class="stats-title"><b>Subscribers/Month</b></span>
				<span class="stats-complete text-white">{{ get_funnel_status('subscriber_limit') }}</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="{{ get_funnel_status('subscriber_limit_percent') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ get_funnel_status('subscriber_limit_percent') }}%;">
						<span class="sr-only">{{ get_funnel_status('subscriber_limit_percent') }}% Complete</span>
					</div>
				</div>
			</li>
			<li style="border-bottom:2px solid #ccc;margin-bottom:15px">
				<span class="stats-title"><b>Emails/month</b></span>
				<span class="stats-complete text-white">{{ get_funnel_status('email_limit') }}</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="{{ get_funnel_status('email_limit_percent') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ get_funnel_status('email_limit_percent') }}%;">
						<span class="sr-only">{{ get_funnel_status('email_limit_percent') }}% Complete</span>
					</div>
				</div>
			</li>
			<li style="margin-bottom:15px">
				<span class="stats-title"><h4>Visitor</h4></span>
			</li>
			<li style="border-bottom:2px solid #ccc;margin-bottom:15px">
				<span class="stats-title"><b>Unique Visitor/month</b></span>
				<span class="stats-complete text-white">{{ get_funnel_status('visitor_limit') }}</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="{{ get_funnel_status('visitor_limit_percent') }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ get_funnel_status('visitor_limit_percent') }}%;">
						<span class="sr-only">{{ get_funnel_status('visitor_limit_percent') }}% Complete</span>
					</div>
				</div>
			</li>
			<li style="margin-bottom:15px">
				<span class="stats-title"><h5>Watermark Removal : {{ get_funnel_status('status_watermark') }}</h5></span>
			</li>

			<li style="border-bottom:2px solid #ccc;margin-bottom:15px">
				<span class="stats-title"><h5>Affiliate Rotation : {{ get_funnel_status('status_affiliate_rotation') }} <i class="fa fa-question-circle" rel="tooltip" title="Affiliate Rotation digunakan untuk merotasi affiliate id apabila visitor mengunjungi scoido.com/tanpa_id 
Fasilitas ini hanya tersedia untuk Scoido Master keatas."></i></h5></span>
			</li>
		</ul>
	</div>
</div>
