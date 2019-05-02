import { TimelineMax, TweenMax, AttrPlugin, Back, Elastic } from 'gsap'
import { DrawSVGPlugin } from './DrawSVGPlugin'
import { MorphSVGPlugin } from './MorphSVGPlugin'
import { SplitText } from './SplitText'

// tree shaking prevent the plugin going bye bye in prod
const plugins = [DrawSVGPlugin, MorphSVGPlugin, AttrPlugin, Back, Elastic] // eslint-disable-line no-unused-vars

export default ({ app }, inject) => {
  inject('gsap', {
    timeline: TimelineMax,
    tween: TweenMax,
    SplitText
  })
}
