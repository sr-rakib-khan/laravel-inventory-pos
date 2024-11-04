<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/icons/dashboard.svg') }}"
                            alt="img" /><span>
                            Dashboard</span> </a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}"
                            alt="img" /><span> Product</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('product.list') }}">Product List</a></li>
                        <li><a href="{{ route('add.product') }}">Add Product</a></li>
                        <li><a href="{{ route('import.product') }}">Import Products</a></li>
                        <li><a href="{{ route('category.list') }}">Category List</a></li>
                        <li><a href="{{ route('add.category') }}">Add Category</a></li>
                        <li><a href="subcategorylist.html">Sub Category List</a></li>
                        <li><a href="{{ route('add.product-specification') }}">Product Specification</a></li>
                        <li><a href="{{ route('brand.list') }}">Brand List</a></li>
                        <li><a href="{{ route('add.brand') }}">Add Brand</a></li>
                        <li><a href="barcode.html">Print Barcode</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/sales1.svg') }}"
                            alt="img" /><span> Sales</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="saleslist.html">Sales List</a></li>
                        <li><a href="{{ route('pos') }}">POS</a></li>
                        <li><a href="pos.html">New Sales</a></li>
                        <li><a href="salesreturnlists.html">Sales Return List</a></li>
                        <li><a href="createsalesreturns.html">New Sales Return</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/sales1.svg') }}"
                            alt="img" /><span> Purchase</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('purchase.list') }}">Purchase List</a></li>
                        <li><a href="{{ route('add.purchase') }}">Add Purchase</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/expense1.svg') }}"
                            alt="img" /><span> Expense</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('expense.list') }}">Expense List</a></li>
                        <li><a href="{{ route('add.expense') }}">Add Expense</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/sales1.svg') }}"
                            alt="img" /><span>Employe Salary</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('all-advanced.salary') }}">All Advanced Salary List</a></li>
                        <li><a href="{{ route('create.advanced-salary') }}">Add Advanced Salary</a></li>

                        <li><a href="{{ route('pay.salary') }}">Pay Salary</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}"
                            alt="img" /><span> Employe</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('employe.list') }}">Employe List</a></li>
                        <li><a href="{{ route('add.employe') }}">Add Employe </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}"
                            alt="img" /><span> Supplier</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('supplier.list') }}">Supplier List</a></li>
                        <li><a href="{{ route('create.supplier') }}">Add Suppllier </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}"
                            alt="img" /><span> Customer</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('customer.list') }}">Customer List</a></li>
                        <li><a href="{{ route('create.customer') }}">Add Customer </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/settings.svg') }}"
                            alt="img" /><span>
                            Settings</span>
                        <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('company.info') }}">Company Info</a></li>
                        <li><a href="emailsettings.html">Email Settings</a></li>
                        <li><a href="paymentsettings.html">Payment Settings</a></li>
                        <li><a href="currencysettings.html">Currency Settings</a></li>
                        <li><a href="grouppermissions.html">Group Permissions</a></li>
                        <li><a href="taxrates.html">Tax Rates</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
