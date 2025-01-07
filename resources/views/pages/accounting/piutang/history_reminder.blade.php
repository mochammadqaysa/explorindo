@php
use App\Helpers\Utils;
@endphp
<div class="card shadow">
  <div class="card-body">
    <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
      <div class="timeline-block">
        <span class="timeline-step badge-info">
          <i class="ni ni-bell-55"></i>
        </span>
        <div class="timeline-content">
          <small class="text-muted font-weight-bold">{{ $piutang->based_on_received == '1' ? Utils::formatTanggalIndo($piutang->tanggal_received) : Utils::formatTanggalIndo($piutang->tanggal_sj) }}</small>
          <h5 class=" mt-3 mb-0">Reminder Ke-1</h5>
        </div>
      </div>
      <div class="timeline-block">
        <span class="timeline-step badge-info">
          <i class="ni ni-bell-55"></i>
        </span>
        <div class="timeline-content">
          <small class="text-muted font-weight-bold">{{ $piutang->based_on_received == '1' ? Utils::formatTanggalIndo($piutang->tanggal_received) : Utils::formatTanggalIndo($piutang->tanggal_sj) }}</small>
          <h5 class=" mt-3 mb-0">Reminder Ke-2</h5>
        </div>
      </div>
      <div class="timeline-block">
        <span class="timeline-step badge-info">
          <i class="ni ni-bell-55"></i>
        </span>
        <div class="timeline-content">
          <small class="text-muted font-weight-bold">{{ $piutang->based_on_received == '1' ? Utils::formatTanggalIndo($piutang->tanggal_received) : Utils::formatTanggalIndo($piutang->tanggal_sj) }}</small>
          <h5 class=" mt-3 mb-0">Reminder Ke-3</h5>
        </div>
      </div>
      <div class="timeline-block">
        <span class="timeline-step badge-info">
          <i class="ni ni-bell-55"></i>
        </span>
        <div class="timeline-content">
          <small class="text-muted font-weight-bold">{{ $piutang->based_on_received == '1' ? Utils::formatTanggalIndo($piutang->tanggal_received) : Utils::formatTanggalIndo($piutang->tanggal_sj) }}</small>
          <h5 class=" mt-3 mb-0">Reminder Ke-4</h5>
        </div>
      </div>
    </div>
  </div>
</div>