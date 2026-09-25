<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Task Manager</title>
    <script src="https://unpkg.com/lucide@latest"></script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

* { margin:0; padding:0; box-sizing:border-box; }

    body {
    font-family: 'Inter', sans-serif;
        background: #f0f6ff;
            color: #0f1b3d;
    display:flex;
}

  :root{
  --blue-950:#0b1e4d;
      --blue-800:#1e3a8a;
  --blue-700: #1d4ed8;
      --blue-600:#2563eb;
    --blue-100:#dbeafe;
      --blue-50:#eff6ff;
  --line:#c7dbfb;
        --ink:#0f1b3d;
    --muted:#5b73a8;
        --green:#22c55e;
    --green-bg:#eff9f1;
  --green-ink:#15803d;
}

/* ---------------- sidebar ---------------- */
    .sidebar{
        width: 220px;
    flex-shrink:0;
  min-height:100vh;
background:#ffffff;
    border-right: 1px solid var(--blue-100);
        padding: 22px 16px;
}
    .sb-brand{
    display:flex; align-items:center; gap:10px;
margin-bottom: 30px; padding: 0 6px;
    }
.sb-brand-mark{
      width:34px;height:34px;border-radius:9px;
    background: linear-gradient(135deg, var(--blue-700), var(--blue-950));
      display:flex;align-items:center;justify-content:center;color:#fff;
        flex-shrink:0;
    }
  .sb-brand-name{ font-weight:800; font-size:15px; color:var(--blue-950); letter-spacing:.2px; }

.sb-label{
    font-size:11px; font-weight:800; letter-spacing:.6px; color:var(--muted);
      text-transform:uppercase; padding: 0 10px; margin-bottom:10px;
}

    .sb-nav{ display:flex; flex-direction:column; gap:4px; margin-bottom: 20px; }
.sb-item{
  display:flex; align-items:center; justify-content:space-between;
        padding: 10px 10px; border-radius: 10px;
      text-decoration:none; color: var(--ink); font-size:13.5px; font-weight:600;
    }
      .sb-item:hover{ background: var(--blue-50); }
.sb-item.active{ background: var(--blue-50); color: var(--blue-700); }
        .sb-item .sb-left{ display:flex; align-items:center; gap:10px; }
    .sb-count{
      background:#fff; border:1px solid var(--line); color: var(--blue-800);
  font-size:11.5px; font-weight:800; padding:2px 8px; border-radius:20px;
}
      .sb-item.active .sb-count{ background: var(--blue-700); color:#fff; border-color: var(--blue-700); }

  .sb-legend{ padding: 14px 10px 0; border-top: 1px solid var(--blue-50); margin-top: 6px; }
.sb-legend p{ font-size:11.5px; color: var(--muted); font-weight:600; display:flex; align-items:center; gap:7px; margin-bottom:7px; }
    .sb-legend .sw{ width:10px; height:10px; border-radius:3px; flex-shrink:0; }
        .sw-pending{ background: var(--blue-700); }
    .sw-completed{ background: var(--green); }

/* ---------------- main ---------------- */
    .main{ flex:1; min-width:0; }

.topbar{
      background:#ffffff;
    border-bottom: 2px solid var(--blue-100);
  padding: 0 36px;
      height: 66px;
  display:flex; align-items:center; justify-content:flex-end; gap:18px;
    position: sticky; top:0; z-index: 10;
}
  .topbar .date{ font-size:13px; color:var(--muted); font-weight:600; }

    .new-btn{
        display:inline-flex; align-items:center; gap:7px;
  background: var(--blue-700);
    color:#fff; text-decoration:none;
        padding: 10px 18px; border-radius: 10px;
  font-weight:700; font-size:13px;
box-shadow: 0 4px 14px rgba(29,78,216,.25);
        transition: background .15s, transform .1s;
    }
.new-btn:hover{ background:var(--blue-800); transform: translateY(-1px); }

.wrap{ max-width: 1080px; margin: 0 auto; padding: 32px 36px 60px; }

    .panel-head{
display:flex; align-items:center; justify-content:space-between;
        margin-bottom:14px;
  }
        .panel-head h1{ font-size:19px; font-weight:800; color: var(--blue-950); }
    .chip{
      background: var(--blue-50); color:var(--blue-700); border:1px solid var(--blue-100);
      font-size:12px; font-weight:700; padding:4px 12px; border-radius:20px;
    }

.notice{
      background: var(--blue-50);
    border: 1px solid var(--blue-100);
  border-left: 4px solid var(--blue-700);
    color: var(--blue-950);
padding: 11px 16px; border-radius:9px; font-size:13px; margin-bottom:18px;
  display:flex; align-items:center; gap:8px;
    }

/* table */
      .list{
        background:#fff; border:1px solid var(--line); border-radius:16px; overflow:hidden;
    }
.t-head{
        display:grid;
grid-template-columns: 1fr 130px 130px 220px;
    padding: 13px 22px;
        background: var(--blue-50);
      border-bottom:1px solid var(--line);
}
        .t-head span{ font-size:11px; font-weight:800; letter-spacing:.5px; text-transform:uppercase; color: var(--blue-800); }

.task-row{
  display:grid;
grid-template-columns: 1fr 130px 130px 220px;
        align-items:center;
        gap: 10px;
    padding: 16px 22px;
      border-bottom: 1px solid var(--blue-50);
        border-left: 3px solid transparent;
    }
    .task-row:last-child{ border-bottom:none; }
.task-row:hover{ background: var(--blue-50); }

.task-row.st-pending{ border-left-color: var(--blue-700); }
    .task-row.st-completed{ border-left-color: var(--green); }
.task-row.is-completed{ opacity:.75; }

    .t-name{ font-weight:700; color:var(--ink); font-size:14px; }
.t-name.done{ text-decoration: line-through; color:var(--muted); }
  .t-desc{ font-size:12px; color:var(--muted); margin-top:3px; }

.due{ font-size:12.5px; color: var(--muted); }

  .pill{
        display:inline-flex; align-items:center; gap:6px;
      padding: 4px 11px; border-radius: 20px; font-size:11.5px; font-weight:700;
    width: fit-content;
    }
.pill-pending{ background: var(--blue-50); color: var(--blue-700); }
        .pill-completed{ background: var(--green-bg); color: var(--green-ink); }
  .dot{ width:6px;height:6px;border-radius:50%; }
    .pill-pending .dot{ background: var(--blue-700); }
.pill-completed .dot{ background: var(--green); }

    .row-acts{ display:flex; gap:6px; justify-content:flex-end; }
        .mini-btn{
      border:none; cursor:pointer; font-family:inherit;
      padding:6px 11px; border-radius:8px; font-size:11.5px; font-weight:700;
        display:inline-flex; align-items:center; gap:4px; text-decoration:none;
  }
      .mini-edit{ background:var(--blue-50); color:var(--blue-700); border:1px solid var(--blue-100); }
    .mini-done{ background: var(--green-bg); color: var(--green-ink); }
.mini-undo{ background:#fffbeb; color:#92400e; }
  .mini-del{ background:#fef2f2; color:#b91c1c; }
    .mini-btn:hover{ filter: brightness(0.96); }

    .empty-state{
padding: 70px 20px; text-align:center;
    }
      .empty-state .ic{
    width:52px;height:52px;border-radius:14px; background:var(--blue-50); color:var(--blue-700);
        display:flex;align-items:center;justify-content:center;margin:0 auto 14px;
      }
.empty-state h3{ color:var(--blue-950); font-size:15px; font-weight:800; margin-bottom:5px; }
      .empty-state p{ color:var(--muted); font-size:13px; }

  @media (max-width: 900px){
        body{ flex-direction:column; }
    .sidebar{ width:100%; min-height:auto; border-right:none; border-bottom:1px solid var(--blue-100); }
    .t-head{ display:none; }
    .task-row{ grid-template-columns: 1fr; }
        .row-acts{ justify-content:flex-start; margin-top:8px; }
}
</style>
</head>
<body>

    <div class="sidebar">
        <div class="sb-brand">
        <div class="sb-brand-mark"><i data-lucide="layout-grid" style="width:17px;height:17px;"></i></div>
    <span class="sb-brand-name">Task Manager</span>
</div>

  <div class="sb-label">Overview</div>
      <div class="sb-nav">
        <a href="{{ route('tasks.index') }}" class="sb-item active">
        <span class="sb-left"><i data-lucide="list" style="width:15px;height:15px;"></i> All Tasks</span>
      <span class="sb-count">{{ $counts['total'] }}</span>
    </a>
            <a href="{{ route('tasks.index', ['status' => 'pending']) }}" class="sb-item">
    <span class="sb-left"><i data-lucide="clock" style="width:15px;height:15px;"></i> Pending</span>
        <span class="sb-count">{{ $counts['pending'] }}</span>
        </a>
    <a href="{{ route('tasks.index', ['status' => 'completed']) }}" class="sb-item">
      <span class="sb-left"><i data-lucide="check-circle" style="width:15px;height:15px;"></i> Done</span>
            <span class="sb-count">{{ $counts['completed'] }}</span>
</a>
        </div>

  <div class="sb-legend">
    <p><span class="sw sw-pending"></span> Blue border = Pending</p>
        <p><span class="sw sw-completed"></span> Green border = Completed</p>
    </div>
    </div>

  <div class="main">
<div class="topbar">
        <span class="date">{{ now()->format('M d, Y') }}</span>
      <a href="{{ route('tasks.create') }}" class="new-btn">
      <i data-lucide="plus" style="width:14px;height:14px;"></i>
New Task
    </a>
  </div>

<div class="wrap">

        <div class="panel-head">
<h1>All Tasks</h1>
        <span class="chip">{{ $counts['total'] }} {{ $counts['total'] === 1 ? 'task' : 'tasks' }}</span>
    </div>

@if(session('alert'))
<div class="notice">
        <i data-lucide="check-circle-2" style="width:15px;height:15px;flex-shrink:0;"></i>
    {{ session('alert') }}
</div>
    @endif

        <div class="list">
    @if($records->isEmpty())
      <div class="empty-state">
        <div class="ic"><i data-lucide="inbox" style="width:24px;height:24px;"></i></div>
      <h3>Nothing here yet</h3>
    <p>Use "New Task" up top to get started.</p>
    </div>
@else
        <div class="t-head">
    <span>Task</span>
            <span>Due Date</span>
      <span>Status</span>
    <span style="text-align:right;">Actions</span>
</div>
    @foreach($records as $record)
    <div class="task-row {{ $record->isCompleted() ? 'is-completed st-completed' : 'st-pending' }}">
                <div>
      <div class="t-name {{ $record->isCompleted() ? 'done' : '' }}">{{ $record->task_name }}</div>
        @if($record->description)
    <div class="t-desc">{{ $record->description }}</div>
      @endif
</div>

  <div class="due">
    {{ $record->due_date ? $record->due_date->format('M d, Y') : '—' }}
        </div>

        <span class="pill {{ $record->isCompleted() ? 'pill-completed' : 'pill-pending' }}">
        <span class="dot"></span>
          {{ $record->status }}
    </span>

    <div class="row-acts">
        <a href="{{ route('tasks.edit', $record) }}" class="mini-btn mini-edit">
        <i data-lucide="pencil" style="width:11px;height:11px;"></i> Edit
    </a>
<form action="{{ route('tasks.updateStatus', $record) }}" method="POST" style="display:inline">
@csrf @method('PATCH')
      @if($record->isPending())
            <button type="submit" class="mini-btn mini-done">
      <i data-lucide="check" style="width:11px;height:11px;"></i> Done
    </button>
    @else
    <button type="submit" class="mini-btn mini-undo">
          <i data-lucide="rotate-ccw" style="width:11px;height:11px;"></i> Reopen
                </button>
            @endif
    </form>
      <form action="{{ route('tasks.destroy', $record) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
        @csrf @method('DELETE')
    <button type="submit" class="mini-btn mini-del">
        <i data-lucide="trash-2" style="width:11px;height:11px;"></i> Delete
</button>
            </form>
    </div>
    </div>
        @endforeach
@endif
        </div>

    </div>
  </div>

<script>lucide.createIcons();</script>
</body>
</html>