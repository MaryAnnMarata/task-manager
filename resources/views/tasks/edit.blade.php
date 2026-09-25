<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task Task Manager</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap');

        * { margin:  0; padding:  0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
               background: #eff6ff;
            color: #0f172a;
            min-height: 100vh;
                }

                .header {
                    background: #0b1e4d;
                         padding: 0 32px;
                     height: 60px;
                    display: flex;
                    align-items: center;
                      justify-content: space-between;
     }

                    .header-left {
                        display: flex;
                align-items: center;
                gap: 12px;
        }

        .logo {
                width: 36px;         height: 36px;
                     background: #2563eb;
                border-radius: 10px;
                     display: flex;
                align-items: center;
                justify-content: center;
                color: white;
        }

        .app-name { font-size: 15px; font-weight: 700; color: white; }

        .breadcrumb {
            display:     flex;
                   align-items: center;
            gap: 7px;
            font-size: 12.5px;
            color: #93c5fd;
        }

        .breadcrumb a { color: #60a5fa; text-decoration: none; }
        .breadcrumb a:hover { color: white; }
        .sep { color: #1e3a8a; }

        .page { max-width: 580px; margin: 48px auto; padding: 0 24px; }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 28px;
        }

        .page-title { font-size: 20px;
         font-weight: 700; color:    #1e3a8a; }
        .page-sub   { font-size: 13px;   color: #3b5aa8; margin-top: 3px; }

        .id-tag {
            background: #dbeafe;
            border: 1px solid #bfdbfe;
                color: #1d4ed8;
              font-size: 11.5px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
             }

        .form-card {
            background: white;
                border-radius: 16px;
            border: 1px solid #bfdbfe;
            padding: 32px;
                 box-shadow: 0 2px 12px rgba(30,58,138,0.06);
        }

        .field { margin-bottom: 22px; }

        label {
            display: block;
            font-size: 12.5px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
                          }

          .req { color: #ef4444; }

         input[type="text"],
                  input[type="date"],
            textarea,
        select {
            width: 100%;
                    padding: 11px 14px;
            border: 1.5px solid #bfdbfe;
                border-radius: 9px;
            font-size: 13.5px;
                   font-family: inherit;
            color: #0f172a;
            background: #eff6ff;
                  outline: none;
               transition: border-color 0.15s, box-shadow 0.15s;
        }

        input:focus, textarea:focus, select:focus {
                border-color: #2563eb;
              background: white;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }

        textarea { resize: vertical; min-height: 95px; line-height: 1.6; }

        .hint { font-size: 12px; color: #93c5fd; margin-top: 5px; }

        .err {
            font-size: 12px;
              color: #dc2626;
            margin-top: 5px;
                 display: flex;
            align-items: center;
            gap: 4px;
        }

        .divider { height: 1px; background: #dbeafe; margin: 24px 0; }

        .form-btns { display: flex; gap: 10px; }

        .btn-save {
                         flex: 1;
                        display: inline-flex;
             align-items: center;
                  justify-content: center;
            gap: 8px;
            background: #2563eb;
                 color: white;
            padding: 12px 20px;
              border-radius: 9px;
              font-size: 14px;
                 font-weight: 700;
            border: none;
               cursor: pointer;
            font-family: inherit;
                  transition: background 0.15s;
     }
        .btn-save:hover { background: #1d4ed8; }

        .btn-cancel {
             display: inline-flex;
              align-items: center;
            justify-content: center;
                      background: #eff6ff;
            color: #1e3a8a;
                    border: 1px solid #bfdbfe;
                   padding: 12px 20px;
            border-radius: 9px;
                   font-size: 14px;
                       font-weight: 600;
            text-decoration: none;
            transition: background 0.15s;
      }
        .btn-cancel:hover { background: #dbeafe; }
    </style>
</head>
<body>

<header class="header">
    <div class="header-left">
 <div class="logo">

            <i data-lucide="check-square"
                 style="width:18px;height:18px;"></i>
        </div>
              <span class="app-name">Task Manager</span>
    </div>
    <div class="breadcrumb">
    <a href="{{ route('tasks.index') }}">Dashboard</a>
 <span class="sep">/</span>
       <span style="color:white;">Edit Task</span>
    </div>
</header>

<div class="page">
    <div class="page-header">
        <div>   <div class="page-title">Edit Task</div>
    <div class="page-sub">Update the information for this task.</div>
        </div>   <span class="id-tag">Task #{{ $task->id }}</span>
    </div>

    <div class="form-card"> <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf @method('PUT')
            <div class="field">  <label>Task Name <span class="req">*</span></label>
                 <input type="text" name="task_name" value="{{ old('task_name', $task->task_name) }}">
                @error('task_name') <div class="err">
        <i data-lucide="alert-circle" style="width:12px;height:12px;"></i>
          {{ $message }} </div>
                @enderror
            </div>
            <div class="field">
                <label>Description</label>
       <textarea name="description">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="field">
            <label>Due Date</label>
      <input type="date" name="due_date" value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}">
    </div>

            <div class="field">
                <label>Status</label>
         <select name="status">
                    <option value="Pending"   {{ old('status', $task->status) === 'Pending'   ? 'selected' : '' }}>Pending</option>
  <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
                <div class="hint">You can also toggle status directly from the dashboard.</div>
            </div>

  <div class="divider"></div>

            <div class="form-btns">
                <button type="submit" class="btn-save">
            <i data-lucide="save" style="width:15px;height:15px;"></i>
                    Save Changes
                </button>
          <a href="{{ route('tasks.index') }}" class="btn-cancel">Discard</a>
    </div>
        </form></div>
</div>

<script>lucide.createIcons();</script>
</body>
</html>