<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tone.Editor Example</title>
  </head>
  <body>

    <script src="Tone.min.js" charset="utf-8"></script>

    <!-- include ToneEditor.js after Tone.js -->
    <script src="../build/Tone-Editor.js" charset="utf-8"></script>

    <script type="text/javascript">
      var reverb = new Tone.Freeverb({
          "roomSize": 0.7,
          "dampening": 4300
      }).toMaster()

      var synthSettings =
      {
        "frequency": 110,
        "detune": 0,
        "oscillator": {
            "frequency": 110,
            "detune": 0,
            "type": "square",
            "phase": 0,
            // "partials": [],
            "volume": 0,
            "mute": false
        },
        "filter": {
            "type": "lowpass",
            "frequency": 0,
            "rolloff": -12,
            "Q": 2,
            "gain": 0
        },
        "envelope": {
            "attack": 0.81,
            "decay": 2.2,
            "sustain": 0,
            "release": 4.85,
            "attackCurve": "linear",
            "releaseCurve": "exponential"
        },
        "filterEnvelope": {
            "baseFrequency": 37.059,
            "octaves": 6.7,
            "exponent": 2,
            "attack": 0.2,
            "decay": 7.1,
            "sustain": 0.1,
            "release": 0.9,
            "attackCurve": "linear",
            "releaseCurve": "exponential"
        },
        "portamento": 0.036,
        "volume": -24.908225375657832
      }

      var synth = new Tone.MonoSynth(

      //   {
      //   oscillator: {
      //     type: "square"
      //   },
      //   filter: {
      //     Q: 2,
      //     type: "lowpass",
      //     rolloff: -12
      //   },
      //   envelope: {
      //     attack: .005,
      //     decay: 1,
      //     sustain: 0,
      //     release: .45
      //   },
      //   filterEnvelope: {
      //     attack: .001,
      //     decay: .1,
      //     sustain: .8,
      //     release: .3,
      //     baseFrequency: 300,
      //     octaves: 3.2
      //   }
      // }

      synthSettings

    ).connect(reverb)

      var synthPart = new Tone.Sequence(function(time, note){
      	synth.triggerAttackRelease(note, "16n", time);
      }, ["C4", ["C4", ["C4", "D3"]], "E3", ["D3", "A2"]]).start(0);

      Tone.Transport.start("+0.1");

      // Tone.Transport.loop = true

      ToneEditor.add({
        'synth': synth,
        'reverb': reverb,
      }).options({
        log: true,
        minify: true,
        align: 'right'
      })
      .master()
      .transport()

      console.log(ToneEditor)

    </script>
  </body>
</html>
