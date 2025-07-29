import LogViewer from './pages/LogViewer'
import LogShow from './pages/LogShow.vue';

Nova.inertia('LogViewer', LogViewer)
Nova.inertia('LogShow', LogShow)

Nova.booting((app, store) => {
  //
})
