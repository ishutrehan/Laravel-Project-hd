<div class="left-aside desktop-view">
    <div class="aside-branding">
        <a href="javascript:void(0);" class="iconic-logo logo-text">H<span style="color: #ffffff;">D</span></a>
        <a href="javascript:void(0);" class="large-logo large-logo-text">Houz<span style="color: #ffffff;">Dealz</span></a><span class="aside-pin waves-effect"><i class="fa fa-thumb-tack"></i></span>
        <span class="aside-close waves-effect"><i class="fa fa-times"></i></span>
    </div>
    <div class="left-navigation">
        <ul class="list-accordion">
            <li><a href="javascript:void(0);" class="waves-effect"><span class="nav-icon"><i class="fa fa-home"></i></span><span class="nav-label">Dashboard</span> <span class="label label-primary">New</span></a>
            </li>
            <li><a href="javascript:void(0);" class="waves-effect"><span class="nav-icon"><i class="fa fa-align-justify"></i></span><span class="nav-label">Mortgage Agent</span></a>
                <ul>
                    <li><a href="{{ url('admin/mortgage') }}">List of Agents</a>
                    </li>
                    <li><a href="{{ url('admin/mortgage/create') }}">Add Mortgage Agent</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="fa fa-table"></i></span><span class="nav-label">Professionals</span></a>
                <ul>
                    <li><a href="{{ url('admin/professional') }}">List of Professionals</a>
                    </li>
                    <li><a href="{{ url('admin/professional/create') }}">Add Professional</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="fa fa-table"></i></span><span class="nav-label">Realtors</span></a>
                <ul>
                    <li><a href="{{ url('admin/realtor') }}">List of Realtors</a>
                    </li>
                    <li><a href="{{ url('admin/realtor/create') }}">Add Realtors</a>
                    </li>
                </ul>
            </li>
            <!-- <li><a href="ui-elements-components.html"><span class="nav-icon"><i class="ico-lab"></i></span><span class="nav-label">Inspectors</span></a>
            </li> -->
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-hammer-wrench"></i></span><span class="nav-label">Inspectors</span></a>
                <ul>
                    <li><a href="{{ url('admin/inspector') }}">List of Inspectors</a>
                    </li>
                    <li><a href="{{ url('admin/inspector/create') }}">Add Inspectors</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="fa fa-table"></i></span><span class="nav-label">Appraisers</span></a>
                <ul>
                    <li><a href="{{ url('admin/appraisers') }}">List of Appraisers</a>
                    </li>
                    <li><a href="{{ url('admin/appraisers/create') }}">Add Appraiser</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="fa fa-user"></i></span><span class="nav-label">Contractors</span></a>
                <ul>
                    <li><a href="{{ url('admin/contractors') }}">List of Contractors</a>
                    </li>
                    <li><a href="{{ url('admin/contractors/create') }}">Add Contractor</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="fa fa-list"></i></span><span class="nav-label">Surveyors</span></a>
                <ul>
                    <li><a href="{{ url('admin/surveyor') }}">List of Surveyors</a>
                    </li>
                    <li><a href="{{ url('admin/surveyor/create') }}">Add Surveyor</a>
                    </li>
                </ul>
            </li>
            <!-- <li><a href="widgets.html"><span class="nav-icon"><i class="ico-lab"></i></span><span class="nav-label">UI Widgets</span>  <span class="label label-primary">New</span></a>
            </li> -->
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-chart"></i></span><span class="nav-label">Property</span></a>
                <ul>
                    <li><a href="{{ url('admin/property') }}">List of Properties</a>
                    </li>
                    <li><a href="{{ url('admin/property/create') }}">Add Property</a>
                    </li>
                    <li><a href="{{ url('admin/property_type') }}">Property Type</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-lifebuoy"></i></span><span class="nav-label">Buyers</span></a>
                <ul>
                    <li><a href="{{ url('admin/buyer') }}">List of Buyers</a>
                    </li>
                    <li><a href="{{ url('admin/buyer/create') }}">Add Buyer</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-lifebuoy"></i></span><span class="nav-label">Sellers</span></a>
                <ul>
                    <li><a href="{{ url('admin/seller') }}">List of Sellers</a>
                    </li>
                    <li><a href="{{ url('admin/seller/create') }}">Add Seller</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-lifebuoy"></i></span><span class="nav-label">Title Companies</span></a>
                <ul>
                    <li><a href="{{ url('admin/title_company') }}">List of Title Companies</a>
                    </li>
                    <li><a href="{{ url('admin/title_company/create') }}">Add Title Company</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-lifebuoy"></i></span><span class="nav-label">Closing Attorneys</span></a>
                <ul>
                    <li><a href="{{ url('admin/closing_attorney') }}">List of Closing Attorneys</a>
                    </li>
                    <li><a href="{{ url('admin/closing_attorney/create') }}">Add Closing Attorney</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-lifebuoy"></i></span><span class="nav-label">Manage Search</span></a>
                <ul>
                    <li><a href="{{ url('admin/manage_search/property_listing') }}">For Property Listing Page</a>
                    </li>
                    <li><a href="javascript:void(0);">Other Pages</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-lifebuoy"></i></span><span class="nav-label">Analytics</span></a>
                <ul>
                    <li><a href="{{ url('admin/financial_analytics') }}">Financial Analytics</a>
                    </li>
                    <li><a href="{{ url('admin/other_statistics') }}">Other Statistics</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="fa fa-envelope-o"></i></span><span class="nav-label">Blog</span></a>
                <ul>
                    <li><a href="{{ url('admin/blog') }}">List all Blogs</a>
                    </li>
                    <li><a href="{{ url('admin/blog/create') }}">Add Blogs</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);"><span class="nav-icon"><i class="ico-pen"></i></span><span class="nav-label">Pages</span></a>
                <ul>
                    <li><a href="javascript:void(0);">List of Pages</a>
                    </li>
                    <li><a href="javascript:void(0);">Add Page</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>