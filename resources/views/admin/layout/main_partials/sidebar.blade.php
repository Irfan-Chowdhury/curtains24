<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled mb-5">

                    <li class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}"><a
                                href="{{route('admin.dashboard')}}"> <i
                                    class="dripicons-meter"></i><span>{{trans('file.Dashboard')}}</span></a>
                    </li>



                    <li class="has-dropdown @if(request()->is('user*')){{ (request()->is('user*')) ? 'active' : '' }}@elseif(request()->is('add-user*')){{ (request()->is('add-user*')) ? 'active' : '' }}@endif">
                            <a href="#users" aria-expanded="false" data-toggle="collapse">
                                <i class="dripicons-user"></i>
                                <span>{{trans('file.User')}}</span>
                            </a>
                        <ul id="users" class="collapse list-unstyled ">
                                <li id="users-menu"><a href="{{route('users-list')}}">{{__('Users List')}}</a></li>
                        </ul>
                    </li>


                    <li class="has-dropdown {{ (request()->is('settings*')) ? 'active' : '' }}">
                            <a href="#Customize_settings" aria-expanded="false" data-toggle="collapse">
                                <i class="dripicons-toggles"></i><span>{{__('Setting')}}</span>
                            </a>
                            <ul id="Customize_settings" class="collapse list-unstyled ">
                                <li id="general_settings"><a href="{{route('general_settings.index')}}">{{__('General Settings')}}</a></li>
                                <li id="mail_setting"><a href="{{route('setting.mail')}}">{{__('Mail Setting')}}</a></li>
                            </ul>
                    </li>


                    <li class="{{ (request()->is('banners')) ? 'active' : '' }}"><a
                        href="{{route('banners.index')}}"> <i
                            class="dripicons-photo"></i><span>{{__('Banner')}}</span></a>
                    </li>


                    <li class="{{ (request()->is('hero-section')) ? 'active' : '' }}"><a
                        href="{{route('hero-section.index')}}"> <i
                            class="dripicons-star"></i><span>{{__('Hero Section')}}</span></a>
                    </li>

                    <li class="{{ (request()->is('modules')) ? 'active' : '' }}"><a
                        href="{{route('modules.index')}}"> <i
                            class="dripicons-view-apps"></i><span>{{__('Modules')}}</span></a>
                    </li>



                    <li class="{{ (request()->is('term-and-conditions')) ? 'active' : '' }}"><a
                        href="{{route('term-and-conditions.index')}}"> <i
                            class="dripicons-document"></i><span>{{__('Term and Conditions')}}</span></a>
                    </li>

                    <li class="{{ (request()->is('privacy-and-policy')) ? 'active' : '' }}"><a
                        href="{{route('privacy-and-policy.index')}}"> <i
                            class="dripicons-lock"></i><span>{{__('Privacy and Policy')}}</span></a>
                    </li>

                    <li class="{{ (request()->is('sliders')) ? 'active' : '' }}"><a
                        href="{{route('sliders.index')}}"> <i
                            class="dripicons-photo"></i><span>{{__('Slider')}}</span></a>
                    </li>

                    <li class="{{ (request()->is('testimonials')) ? 'active' : '' }}"><a
                        href="{{route('testimonials.index')}}"> <i
                            class="dripicons-view-apps"></i><span>{{__('Testimonials')}}</span></a>
                    </li>







                <li class="has-dropdown {{ (request()->is('organization*')) ? 'active' : '' }}"><a href="#Organization" aria-expanded="false" data-toggle="collapse">
                        <i
                                class="dripicons-view-thumb"></i><span>{{trans('file.Organization')}}</span></a>
                    <ul id="Organization" class="collapse list-unstyled ">
                        @can('view-location')
                            <li id="location"><a href="{{route('locations.index')}}">{{trans('file.Location')}}</a></li>
                        @endcan
                        @can('view-company')
                            <li id="company"><a href="{{route('companies.index')}}">{{trans('file.Company')}}</a></li>
                        @endcan
                        @can('view-department')
                            <li id="department"><a
                                        href="{{route('departments.index')}}">{{trans('file.Department')}}</a>
                            </li>
                        @endcan

                        @can('view-designation')
                            <li id="designation"><a
                                        href="{{route('designations.index')}}">{{trans('file.Designation')}}</a>
                            </li>
                        @endcan

                        {{-- @can('announcement') --}}
                            <li id="announcements"><a href="{{route('announcements.index')}}">{{trans('file.Announcements')}}</a></li>
                        {{-- @endcan --}}

                        {{-- @can('policy') --}}
                            <li id="company_policy"><a href="{{route('policy.index')}}">{{__('Company Policy')}}</a></li>
                        {{-- @endcan --}}
                    </ul>
                </li>



                @can('timesheet')
                    <li class="has-dropdown {{ (request()->is('timesheet*')) ? 'active' : '' }}"><a href="#Timesheets"
                                                                                                    aria-expanded="false"
                                                                                                    data-toggle="collapse">
                            <i class="dripicons-clock"></i><span>{{trans('file.Timesheets')}}</span></a>
                        <ul id="Timesheets" class="collapse list-unstyled ">

                            @can('edit-attendance')
                                <li id="update_attendance"><a
                                            href="{{route('update_attendances.index')}}"> {{__('Add/Update Attendances')}}</a>
                                </li>
                            @endcan

                            @can('import-attendance')
                                <li id="import_attendance"><a
                                            href="{{route('attendances.import')}}"> {{__('Import Attendances')}}</a>
                                </li>
                            @endcan
                            @can('view-office_shift')
                                <li id="office_shift"><a
                                            href="{{route('office_shift.index')}}">{{__('Office Shift')}}</a>
                                </li>
                            @endcan
                            @can('view-holiday')
                                <li id="holiday"><a href="{{route('holidays.index')}}">{{__('Manage Holiday')}}</a></li>
                            @endcan
                            @can('view-leave')
                                <li id="leave"><a href="{{route('leaves.index')}}">{{__('Manage Leaves')}}</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('payment-module')
                    <li class="has-dropdown {{ (request()->is('payroll*')) ? 'active' : '' }}">

                        @if(auth()->user()->can('view-payslip') || auth()->user()->can('view-paylist'))
                            <a href="#Payroll" aria-expanded="false" data-toggle="collapse">
                                <i class="dripicons-wallet"></i><span>{{trans('file.Payroll')}}</span>
                            </a>
                        @endif

                        <ul id="Payroll" class="collapse list-unstyled ">
                            @can('view-payslip')
                                <li><a href="{{route('payroll.index')}}">{{__('New Payment')}}</a>
                                </li>
                            @endcan
                            @can('view-paylist')
                                <li><a href="{{route('payment_history.index')}}">{{__('Payment History')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                {{-- @can('performance')
                        <li class="has-dropdown {{ (request()->is('performance*')) ? 'active' : '' }}">
                            @if(auth()->user()->can('view-goal-type') || auth()->user()->can('view-goal-tracking') || auth()->user()->can('view-indicator') || auth()->user()->can('view-appraisal'))
                                <a href="#performance" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bar-chart"></i>
                                    <span>Performance</span>
                                </a>
                            @endif
                            <ul id="performance" class="collapse list-unstyled ">
                                @can('view-goal-type')
                                    <li id="goal-type"><a href="{{route('performance.goal-type.index')}}">{{__('Goal type')}}</a></li>
                                @endcan
                                @can('view-goal-tracking')
                                    <li id="goal-tracking"><a href="{{route('performance.goal-tracking.index')}}">{{__('Goal Tracking')}}</a></li>
                                @endcan
                                @can('view-indicator')
                                    <li id="indicator"><a href="{{route('performance.indicator.index')}}">{{__('Indicator')}}</a></li>
                                @endcan
                                @can('view-appraisal')
                                    <li id="appraisal"><a href="{{route('performance.appraisal.index')}}">{{__('Appraisal')}}</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan --}}

                @can('view-calendar')
                    <li class="{{ (request()->is('calendar*')) ? 'active' : '' }}"><a
                                href="{{route('calendar.index')}}"> <i
                                    class="dripicons-calendar"></i><span>{{__('HR Calendar')}}</span></a>
                    </li>
                @endcan

                    <li class="has-dropdown {{ (request()->is('report*')) ? 'active' : '' }}"><a href="#HR_Reports"
                                                                                                 aria-expanded="false"
                                                                                                 data-toggle="collapse">
                            <i class="dripicons-document"></i><span>{{__('HR Reports')}}</span></a>
                        <ul id="HR_Reports" class="collapse list-unstyled ">

                            <!--New added-->
                            <li id="attendance"><a href="{{route('attendances.index')}}">{{__('Daily Attendances')}}</a></li>
                            <li id="date_wise_attendance"><a href="{{route('date_wise_attendances.index')}}"> {{__('Date wise Attendances')}}</a></li>
                            <li id="monthly_attendance"><a href="{{route('monthly_attendances.index')}}"> {{__('Monthly Attendances')}}</a></li>
                            <!--New added End-->

                            @can('report-training')
                                <li id="training_report"><a
                                            href="{{route('report.training')}}">{{__('Training Report')}}</a>
                                </li>
                            @endcan
                            @can('report-project')
                                <li id="project_report"><a
                                            href="{{route('report.project')}}">{{__('Project Report')}}</a>
                                </li>
                            @endcan
                            @can('report-task')
                                <li id="task_report"><a
                                            href="{{route('report.task')}}">{{__('Task Report')}}</a></li>
                            @endcan
                            @can('report-employee')
                                <li id="employees_report"><a
                                            href="{{route('report.employees')}}">{{__('Employees Report')}}</a>
                                </li>
                            @endcan
                            @can('report-account')
                                <li id="account_report"><a
                                            href="{{route('report.account')}}">{{__('Account Report')}}</a>
                                </li>
                            @endcan
                            @can('report-expense')
                                <li id="expense_report"><a
                                            href="{{route('report.expense')}}">{{__('Expense Report')}}</a>
                                </li>
                            @endcan
                            @can('report-deposit')
                                <li id="deposit_report"><a
                                            href="{{route('report.deposit')}}">{{__('Deposit Report')}}</a>
                                </li>
                            @endcan
                            @can('report-transaction')
                                <li id="transaction_report"><a
                                            href="{{route('report.transaction')}}">{{__('Transaction Report')}}</a>
                                </li>
                            @endcan

                            @can('report-pension')
                                <li id="pension_report"><a href="{{route('report.pension')}}">{{__('Pension Report')}}</a></li>
                            @endcan
                        </ul>
                    </li>

                @can('recruitment')
                    <li class="has-dropdown {{ (request()->is('recruitment*')) ? 'active' : '' }}">

                        @if(auth()->user()->can('view-job_post') || auth()->user()->can('view-job_candidate')|| auth()->user()->can('view-job_interview') || auth()->user()->can('view-cms'))
                            <a href="#Recruitment" aria-expanded="false" data-toggle="collapse">
                                <i class="dripicons-user-id"></i><span>{{trans('file.Recruitment')}}</span>
                            </a>
                        @endif

                        <ul id="Recruitment" class="collapse list-unstyled ">

                            @can('view-job_post')
                                <li id="job_post"><a
                                            href="{{route('job_posts.index')}}">{{__('Job Post')}}</a></li>
                            @endcan
                            @can('view-job_candidate')
                                <li id="job_candidate"><a
                                            href="{{route('job_candidates.index')}}">{{__('Job Candidates')}}</a>
                                </li>
                            @endcan
                            @can('view-job_interview')
                                <li id="job_interview"><a
                                            href="{{route('job_interviews.index')}}">{{__('Job Interview')}}</a>
                                </li>
                            @endcan
                            @can('view-cms')
                                <li id="cms"><a
                                            href="{{route('cms.index')}}">{{__('CMS')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('training_module')
                    <li class="has-dropdown @if(request()->is('training*')){{ (request()->is('training*')) ? 'active' : '' }}@elseif(request()->is('dynamic_variable/training_type*')){{ (request()->is('dynamic_variable/training_type*')) ? 'active' : '' }}@endif">
                        @if(auth()->user()->can('view-training') || auth()->user()->can('access-variable_type')|| auth()->user()->can('access-trainer'))
                            <a href="#Training" aria-expanded="false" data-toggle="collapse"> <i
                                        class="dripicons-trophy"></i><span>{{trans('file.Training')}}</span>
                            </a>
                        @endcan
                        <ul id="Training" class="collapse list-unstyled ">
                            @can('view-training')
                                <li id="training_list"><a
                                            href="{{route('training_lists.index')}}">{{__('Training List')}}</a>
                                </li>
                            @endcan
                            @can('access-variable_type')
                                <li id="training_type"><a
                                            href="{{route('training_type.index')}}">{{__('Training Type')}}</a>
                                </li>
                            @endcan
                            @can('view-trainer')
                                <li id="trainers"><a
                                            href="{{route('trainers.index')}}">{{trans('file.Trainers')}}</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('event-meeting')
                    <li class="has-dropdown @if(request()->is('events*')){{ (request()->is('events*')) ? 'active' : '' }}@elseif(request()->is('meetings*')){{ (request()->is('meetings*')) ? 'active' : '' }}@endif">

                        @if(auth()->user()->can('view-event') || auth()->user()->can('view-meeting'))
                            <a href="#Events_Meetings" aria-expanded="false" data-toggle="collapse"> <i
                                        class="dripicons-to-do"></i><span>{{trans('file.Events')}} & {{trans('file.Meetings')}}</span>
                            </a>
                        @endcan
                        <ul id="Events_Meetings" class="collapse list-unstyled ">
                            @can('view-event')
                                <li id="events"><a
                                            href="{{route('events.index')}}">{{trans('file.Events')}}</a>
                                </li>
                            @endcan
                            @can('view-meeting')
                                <li id="meetings"><a
                                            href="{{route('meetings.index')}}">{{trans('file.Meetings')}}</a>
                                </li>
                            @endcan
                        </ul>
                        @endcan
                    </li>

                    @can('project-management')
                        <li class="has-dropdown {{ (request()->is('project-management*')) ? 'active' : '' }}">
                            @if(auth()->user()->can('view-project') || auth()->user()->can('view-task') || auth()->user()->can('client') || auth()->user()->can('view-invoice'))
                                <a href="#Project_Management" aria-expanded="false" data-toggle="collapse">
                                    <i class="dripicons-checklist"></i><span>{{__('Project Management')}}</span>
                                </a>
                            @endcan
                            <ul id="Project_Management" class="collapse list-unstyled ">
                                @can('view-project')
                                    <li id="projects"><a
                                                href="{{route('projects.index')}}">{{trans(('file.Projects'))}}</a>
                                    </li>
                                @endcan
                                @can('view-task')
                                    <li id="tasks"><a
                                                href="{{route('tasks.index')}}">{{trans(('file.Tasks'))}}</a>
                                    </li>
                                @endcan
                                @can('client')
                                    <li id="clients"><a
                                                href="{{route('clients.index')}}">{{trans(('file.Client'))}}</a>
                                    </li>
                                @endcan

                                @can('view-invoice')
                                    <li id="invoices"><a
                                                href="{{route('invoices.index')}}">{{trans(('file.Invoice'))}}</a>
                                    </li>
                                @endcan
                                @can('access-variable_type')
                                    <li id="tax_type"><a
                                                href="{{route('tax_type.index')}}">{{__('Tax Type')}}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('view-ticket')
                        <li class="{{ (request()->is('tickets*')) ? 'active' : '' }}">
                                <a href="{{route('tickets.index')}}"> <i
                                            class="dripicons-ticket"></i><span>{{__('Support Tickets')}}</span>
                                </a>
                        </li>
                    @endcan

                    @can('finance')
                        <li class="has-dropdown {{ (request()->is('accounting*')) ? 'active' : '' }}">

                            @if(auth()->user()->can('view-account') || auth()->user()->can('view-payee') || auth()->user()->can('view-payer') ||auth()->user()->can('view-deposit')||auth()->user()->can('view-expense')||auth()->user()->can('view-transaction')||auth()->user()->can('view-balance_transfer'))
                                <a href="#Finance" aria-expanded="false" data-toggle="collapse">
                                    <i class="dripicons-graph-pie"></i><span>{{trans('file.Finance')}}</span>
                                </a>
                            @endcan

                            <ul id="Finance" class="collapse list-unstyled ">
                                @can('view-account')
                                    <li id="accounting_list"><a
                                                href="{{route('accounting_list.index')}}">{{__('Accounts List')}}</a>
                                    </li>
                                @endcan
                                @can('view-account')
                                    <li id="account_balances"><a
                                                href="{{route('account_balances')}}">{{__('Account Balances')}}</a>
                                    </li>
                                @endcan
                                @can('view-payee')
                                    <li id="payees"><a
                                                href="{{route('payees.index')}}">{{trans(('file.Payee'))}}</a>
                                    </li>
                                @endcan
                                @can('view-payer')
                                    <li id="payers"><a
                                                href="{{route('payers.index')}}">{{trans(('file.Payer'))}}</a>
                                    </li>
                                @endcan
                                @can('view-deposit')
                                    <li id="deposit"><a
                                                href="{{route('deposit.index')}}">{{trans(('file.Deposit'))}}</a>
                                    </li>
                                @endcan
                                @can('view-expense')
                                    <li id="expense"><a
                                                href="{{route('expense.index')}}">{{trans(('file.Expense'))}}</a>
                                    </li>
                                @endcan
                                @can('view-transaction')
                                    <li id="transactions"><a
                                                href="{{route('transactions.index')}}">{{trans(('file.Transaction'))}}</a>
                                    </li>
                                @endcan
                                @can('view-balance_transfer')
                                    <li id="finance_transfer"><a
                                                href="{{route('finance_transfer.index')}}">{{trans(('file.Transfer'))}}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('assets-and-category')
                        <li class="has-dropdown @if(request()->is('assets*')){{ (request()->is('assets*')) ? 'active' : '' }}@elseif(request()->is('dynamic_variable/assets_category*')){{ (request()->is('dynamic_variable/assets_category*')) ? 'active' : '' }}@endif">
                            @if(auth()->user()->can('category') || auth()->user()->can('assets'))
                                <a href="#assets" aria-expanded="false" data-toggle="collapse"> <i
                                            class="dripicons-box"></i><span>{{trans(('file.Assets'))}}</span>
                                </a>
                            @endcan
                            <ul id="assets" class="collapse list-unstyled ">
                                @can('category')
                                    <li id="assets_category"><a
                                        href="{{route('assets_category.index')}}">{{trans(('file.Category'))}}</a>
                                    </li>
                                @endcan

                                @can('assets')
                                    <li id="assets"><a href="{{route('assets.index')}}">{{trans(('file.Assets'))}}</a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @if (config('auto_update.product_mode') === "DEVELOPER")
                        <li class="{{ (request()->is('developer-section*')) ? 'active' : '' }}"><a
                            href="{{route('admin.developer-section.index')}}">
                            <i class="dripicons-calendar"></i><span> {{__('Auto Update Setting')}}</span></a>
                        </li>
                    @endif

                    @can('file_module')
                        <li class="has-dropdown {{ (request()->is('file_manager*')) ? 'active' : '' }}">

                            @if(auth()->user()->can('view-file_manager') || auth()->user()->can('view-official_documents'))
                                <a href="#file_manager" aria-expanded="false" data-toggle="collapse"> <i
                                            class="dripicons-archive"></i><span>{{__('File Manager')}}</span>
                                </a>
                            @endcan

                            <ul id="file_manager" class="collapse list-unstyled ">

                                @can('view-file_manager')
                                    <li id="files"><a
                                                href="{{route('files.index')}}">{{__('File Manager')}}</a>
                                    </li>
                                @endcan

                                @can('view-official_documents')
                                    <li id="official_documents"><a
                                                href="{{route('official_documents.index')}}">{{__('Official Documents')}}</a>
                                    </li>
                                @endcan

                                @can('view-file_config')
                                    <li id="file_config"><a
                                                href="{{route('file_config.index')}}">{{__('File Configuration')}}</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @if (Auth::user()->role_users_id===1)
                        <li>
                            <a href="{{url('/documentation')}}"> <i class="dripicons-information"></i><span>{{__('file.Documentation')}}</span></a>
                        </li>
                        <li class="{{ (request()->is('addons*')) ? 'active' : '' }}">
                            <a href="{{route('addons')}}"> <i class="dripicons-flag"></i><span>{{__('Addons')}}</span>
                            </a>
                        </li>
                    @endif

            </ul>
        </div>
    </div>
</nav>
