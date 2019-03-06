ARG VARNISH_VERSION=6.0

FROM cooptilleuls/varnish:${VARNISH_VERSION}-alpine AS app_varnish

COPY conf/default.vcl /usr/local/etc/varnish/default.vcl
