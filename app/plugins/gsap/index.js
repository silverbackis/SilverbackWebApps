import { TimelineMax, TweenMax } from 'gsap'
import DrawSVGPlugin from './DrawSVGPlugin'
import MorphSVGPlugin from './MorphSVGPlugin'
import SplitText from './SplitText'

// tree shaking prevent the plugin going bye bye in prod
const plugins = [DrawSVGPlugin, MorphSVGPlugin]
export default ({ app }, inject) => {
  inject('gsap', {
    timeline: TimelineMax,
    tween: TweenMax,
    SplitText
  })
}
