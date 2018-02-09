# Testing PHP apps with Kubernetes

## Create a local Kubernetes cluster

Using kubeadm-dind-cluster

    ./dind-cluster-v1.sh

## Build images

    docker build --tag=pmg/symfony-client:v1 . -f Dockerfile-sfclient
    docker build --tag=pmg/symfony-webservice:v1 . -f Dockerfile-sfwebservice


## Push images or load locally

e.g.

    docker save pmg/symfony-client | docker exec -i kube-node-{n} docker load  

## Create deployments

    kubectl run sfwebservice --image=pmg/symfony-webservice:v1 --port=80 --image-pull-policy=Never
    kubectl run sfclient --image=pmg/symfony-client:v1 --port=80 --image-pull-policy=Never

## Create services

    kubectl expose deployment sfwebservice --type=LoadBalancer --name=my-sfwebservice
    kubectl expose deployment sfclient --type=LoadBalancer --name=my-sfclient

## Test

    http://localhost:8080/api/v1/namespaces/default/services/my-sfclient/proxy/

## References

+ https://github.com/Mirantis/kubeadm-dind-cluster
+ https://bitgandtter.blog/2015/08/19/kubernetes-a-how-to-with-php/
+ https://github.com/shipping-docker/vessel
