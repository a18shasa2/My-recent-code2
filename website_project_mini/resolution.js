/*Downloaded from https://www.codeseek.co/mkhazov/videojs-resolution-switcher-vKdPVR */
var player = videojs('player', {
  plugins: {
    videoJsResolutionSwitcher: {
      default: 'low',
      dynamicLabel: true
    }
  }
});
player.updateSrc([
  {
    src: 'argai01swe.mp4',
    type: 'video/mp4',
    res: 719,
    label: 'Svenska'
  },
  {
    src: 'argai01fre.mp4',
    type: 'video/mp4',
    res: 720,
    label: 'Franska'
  },
])