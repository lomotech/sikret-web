<li class="">
    <a href="{{ route('home') }}"><i class="fa fa-home"></i> <span class="nav-label">Utama</span></a>
</li>
<li class="">
    <a href="{{ route('users.edit', Auth::id()) }}"><i class="fa fa-user"></i> <span class="nav-label">Profil</span></a>
</li>
<li class="">
    <a href="{{ route('xrefEnactments.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Negara</span></a>
</li>
<li class="">
    <a href="{{ route('xrefStates.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Negeri</span></a>
</li>
<li class="">
    <a href="{{ route('xrefDistricts.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Daerah</span></a>
</li>
<li class="">
    <a href="{{ route('xrefSubdistricts.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Mukim</span></a>
</li>
<li class="">
    <a href="{{ route('xrefEnactments.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Enakmen</span></a>
</li>
<li class="">
    <a href="{{ route('xrefSections.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Seksyen</span></a>
</li>
<li class="">
    <a href="{{ route('xrefSubsections.index') }}"><i class="fa fa-user"></i> <span class="nav-label">Subseksyen</span></a>
</li><li class="{{ Request::is('courtCases*') ? 'active' : '' }}">
    <a href="{!! route('courtCases.index') !!}"><i class="fa fa-edit"></i><span>Court Cases</span></a>
</li>

<li class="{{ Request::is('menus*') ? 'active' : '' }}">
    <a href="{!! route('menus.index') !!}"><i class="fa fa-edit"></i><span>Menus</span></a>
</li>

<li class="{{ Request::is('menuRates*') ? 'active' : '' }}">
    <a href="{!! route('menuRates.index') !!}"><i class="fa fa-edit"></i><span>Menu Rates</span></a>
</li>

